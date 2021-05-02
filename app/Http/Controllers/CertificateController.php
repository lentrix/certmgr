<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\Event;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function store(Request $request, Event $event) {
        $this->validate($request, [
            'recipient_name' => 'required'
        ]);

        $cert = Certificate::create([
            'event_id' => $event->id,
            'recipient_name' => $request['recipient_name'],
            'recipient_designation' => $request['recipient_designation'],
            'recipient_org' => $request['recipient_org'],
            'issued_at' => Carbon::now(),
            'issued_by' => auth()->user()->id,
            'remarks' => $request['remarks'],
        ]);

        return redirect('/events/' . $event->id)
            ->with('Info','A certificate has been issued for ' . $cert->recipient_id . '.');
    }

    public function showCert(Certificate $cert) {
        $pdf = \PDF::loadView('certificates.cert', compact('cert'));
        $pdf->setPaper('a4','landscape');

        return $pdf->stream("certificate.pdf");
    }

    public function downloadCert(Certificate $cert) {
        $pdf = \PDF::loadView('certificates.cert', compact('cert'));
        $pdf->setPaper('a4','landscape');

        $filename = $cert->recipient_name . "_" . $cert->event->title . ".pdf";
        return $pdf->download($filename);
    }

    public function show(Certificate $cert) {
        return view('certificates.view', [
            'cert' => $cert
        ]);
    }
}

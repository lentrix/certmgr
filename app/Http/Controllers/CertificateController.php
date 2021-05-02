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

    public function show(Certificate $cert) {
        return view('certificates.view', [
            'cert' => $cert
        ]);
    }

    public function verify($certId) {
        $cert = Certificate::find($certId);

        if($cert) {
            return redirect('/certificates/' . $certId);
        }else {
            return view('certificates.invalid', ['certNumber'=>$certId]);
        }
    }

    public function preVerify() {
        return view('certificates.preverify');
    }

    public function verifyCode(Request $request) {
        $this->validate($request, ['code'=>'required']);

        $cert = Certificate::find($request['code']);

        if($cert) {
            return view('certificates.view', compact('cert'));
        }else {
            return view('certificates.invalid', ['certNumber'=>$request['code']]);
        }
    }

    public function update(Request $request, Certificate $cert) {
        $this->validate($request, ['recipient_name'=>'required']);
        $cert->update($request->all());

        return redirect('/certificates/' . $cert->id)->with('Info','This certificate has been updated.');
    }

}

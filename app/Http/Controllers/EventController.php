<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index() {
        $events = Event::orderBy('created_at','desc')->get();
        return view('events.index',['events' => $events]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $path = $request->file('file')->store('public/templates');

        $event = Event::create([
            'title' => $request['title'],
            'details' => $request['details'],
            'tags' => $request['tags'],
            'person_incharge' => $request['person_incharge'],
            'details' => $request['details'],
            'created_by' => auth()->user()->id,
            'template_path' => $path,
        ]);

        return redirect('/events/' . $event->id);
    }

    public function edit(Event $event) {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event) {
        $this->validate($request, [
            'title' => 'required'
        ]);

        if($request->file('file')) {
            $path = $request->file('file')->store('public/templates');
            Storage::delete($event->template_path);
            $request->request->add(['template_path', $path]);
        }

        $event->update($request->all());

        return redirect('/events/' . $event->id)->with('Info','The event has been updated.');
    }

    public function show(Event $event) {
        return view('events.view', compact('event'));
    }

    public function changeTemplate(Request $request, Event $event) {
        $this->validate($request, [
            'file' => 'required'
        ]);

        $path = $request->file('file')->store('public/templates');
        Storage::delete($event->template_path);
        $event->update(['template_path'=>$path]);
        return redirect('/events/' . $event->id)->with('Info','Template has been updated');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Rally;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class ClubDashboardController extends Controller
{
    public function createdEvents(){
        $userId = Auth::id();
        $myEvents = Event::where('user_id', $userId)->get();

        return view('club.club-dashboard', [
            'userEvents' => $myEvents,
        ]);
    }

    public function createEvent(){
        return view('club.create-event');
    }

    public function create_event(){

        $userId = Auth::id();
        $club = Auth::user()->club_id;

        $rally=null;

        request()->validate([
            'title' => 'required|min:5|max:21',
            'date' => 'required|date|after:tomorrow',
            'time' => 'required',
            'location' => 'required|max:240',
            'info' => 'required|max:240',
            'event-type' => 'required'
        ]);

        if(request()->get('event-type') == "rally"){
            $rally = Rally::create([]);

            $event = Event::create([
                'title' => request()->get('title', ''),
                'date' => request()->get('date', ''),
                'time' => request()->get('time', ''),
                'location' => request()->get('location', ''),
                'info' => request()->get('info', ''),
                'club_id' => $club,
                'user_id' => $userId,
                'rally_id' => $rally->id,
            ]);
        } else {
            $event = Event::create([
                'title' => request()->get('title', ''),
                'date' => request()->get('date', ''),
                'time' => request()->get('time', ''),
                'location' => request()->get('location', ''),
                'info' => request()->get('info', ''),
                'club_id' => $club,
                'user_id' => $userId,
                'rally_id' => NULL,
            ]);
        }

        return redirect()->route('club.dashboard');
    }

    public function event_detail($event_id){

        $registrations = Registration::where('event_id', $event_id)->get();

        return view('club.event-detail', [
            'event' => Event::with('club')->where('id', $event_id)->first(),
            'users' => $registrations,
        ]);
    }

    public function delete_event($event_id){

        $userId = Auth::id();
        $event = Event::where('user_id', $userId)->where('id', $event_id)->first();

        $event->delete();
        return redirect()->route('club.dashboard')->with('success', 'Dogodek je bil izbrisan uspešno!');
    }

    public function editEvent($event_id){

        return view('club.edit-event-form', [
            'event' => Event::with('club')->where('id', $event_id)->first()
        ]);
    }

    public function edit_event($event_id){

        $userId = Auth::id();

        request()->validate([
                    'title' => 'required|min:5|max:21',
                    'date' => 'required|date|after:tomorrow',
                    'time' => 'required',
                    'location' => 'required|max:240',
                    'info' => 'required|max:240',
                ]);

        $event = Event::where('user_id', $userId)->where('id', $event_id)->first();


        $event->title = request()->get('title','');
        $event->date = request()->get('date','');
        $event->time = request()->get('time','');
        $event->location = request()->get('location','');
        $event->info = request()->get('info','');

        $event->save();

        return redirect()->route('club.event', $event->id)->with('success', 'Posodobitev je bila uspešna!');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Rally;
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
            'info' => 'max:240',
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


}

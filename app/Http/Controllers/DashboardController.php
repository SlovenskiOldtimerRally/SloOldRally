<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function userEvents(){
        $userId = Auth::id();

        $myRegistrations = Registration::where('user_id', $userId)->get();

        $myEvents = [];

        foreach($myRegistrations as $reg){
            $myEvents[] = Event::with('club')->where('id', $reg->event_id)->first();
        }

        return view('dashboard', [
            'userEvents' => $myEvents,
            'allEvents' => Event::all()
        ]);
    }


    public function event_detail($event_id){

        return view('event.event-detail', [
            'event' => Event::with('club')->where('id', $event_id)->first()
        ]);
    }


}

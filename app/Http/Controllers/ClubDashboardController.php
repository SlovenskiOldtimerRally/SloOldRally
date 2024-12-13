<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
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


}

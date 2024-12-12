<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function userEvents(){
        $userId = Auth::id();
        $myEvents = Event::where('user_id', $userId)->get();
        return view('dashboard', [
            'userEvents' => $myEvents,
            'allEvents' => Event::all()
        ]);
    }
}

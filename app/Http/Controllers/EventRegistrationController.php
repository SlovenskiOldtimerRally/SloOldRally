<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    public function create_registration($event_id)
    {

        $userId = Auth::id();

        $eventRegistration = Registration::where('user_id', $userId)->where('event_id', $event_id)->first();


        if($eventRegistration != null){
            return redirect()->back()->with('failure', 'Na ta dogodek ste že prijavljeni');
        }


        $registration = Registration::create([
            'user_id' => $userId,
            'event_id' => $event_id,
        ]);

        return redirect()->back()->with('success', 'Prijava je bila uspešna');

    }

    public function delete_registration($event_id)
    {
        $userId = Auth::id();

        $eventRegistration = Registration::where('user_id', $userId)->where('event_id', $event_id)->first();

        if($eventRegistration == null){
            return redirect()->back()->with('failure', 'Odjava ni mogoča saj niste prijavljeni!');
        }
        $eventRegistration->delete();

        return redirect()->back()->with('success', 'Odjava je bila uspešna');
    }

}
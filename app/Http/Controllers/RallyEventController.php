<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;


class RallyEventController extends Controller
{
    //

    public function edit_points($event, $participiant)
    {

        $userId = Auth::id();

        request()->validate([
            'punctuality_drive_timeDiff' => '',
            'skill_drive_penalty' => '',
            'penalty' => '',
            'points' => '',
            'ranking' => '',
        ]);

        $registration = Registration::where('id', $participiant)->first();


        $registration->punctuality_drive_timeDiff = request()->get('punctuality_drive_timeDiff','');
        $registration->skill_drive_penalty = request()->get('skill_drive_penalty','');
        $registration->penalty = request()->get('penalty','');
        $registration->points = request()->get('points','');
        $registration->ranking = request()->get('ranking','');

        $registration->save();

        return redirect()->back()->with('success', 'Uspešno posodobljeno');

    }


}

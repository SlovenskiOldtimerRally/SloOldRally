<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Club;

class LandingController extends Controller
{
    //
    public function index()
    {
        $events = Event::with('club')->orderBy('created_at', 'DESC');
        $clubs = Club::orderBy('name')->get();
        return view('landing', [
            'events' => $events->paginate(5),
            'clubs' => $clubs,
            'selectedClubId' => null // No club pre-selected by default
        ]);
    }

    public function filter(Request $request)
{
    $clubId = $request->input('club_id'); // Get the selected club ID
    $clubs = Club::orderBy('name')->get(); // Fetch all clubs for the dropdown

    // Query events, filtered by club ID if provided
    $eventsQuery = Event::with('club')->orderBy('created_at', 'DESC');

    if (!empty($clubId)) { // Check if club_id is not empty
        $eventsQuery->where('club_id', $clubId);
    }

    $events = $eventsQuery->paginate(5);

    return view('landing', [
        'events' => $events,
        'clubs' => $clubs,
        'selectedClubId' => $clubId // Pass selected club ID to the view
    ]);
}
}

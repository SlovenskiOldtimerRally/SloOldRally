<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|numeric|min:1900|max:2100',
        ]);

        $user = Auth::user();

        if ($user->car) {
            return back()->with('error', 'You already have a car.');
        }

        $user->car()->create([
            'brand' => $request->brand,
            'model' => $request->model,
            'category' => $request->category,
            'year' => $request->year,
            'coefficient' => 1.0,
        ]);

        return back()->with('success', 'Car added successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|numeric|min:1900|max:2100',
        ]);

        $user = Auth::user();

        if (!$user->car) {
            return back()->with('error', 'No car to update.');
        }

        $user->car()->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'category' => $request->category,
            'year' => $request->year,
        ]);

        return back()->with('success', 'Car updated successfully.');
    }

    public function destroy()
    {
        $user = auth()->user();

        if ($user->car) {
            $user->car()->delete();
            return redirect()->route('profile.edit')->with('status', 'Car information deleted successfully.');
        }

        return redirect()->route('profile.edit')->with('error', 'No car information to delete.');
    }

}

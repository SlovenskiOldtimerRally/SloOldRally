<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type' => 'required|in:car,motorcycle,other',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|numeric|min:1900|max:2100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vehicle_images', 'public'); //public/vehicle_images Use "php artisan storage:link" to link
        }

        if ($user->car) {
            return back()->with('error', 'You already have a car.');
        }

        $user->car()->create([
            'vehicle_type' => $request->vehicle_type,
            'brand' => $request->brand,
            'model' => $request->model,
            'category' => $request->category,
            'year' => $request->year,
            'coefficient' => 1.0,
            'image' => $imagePath,
        ]);

        return back()->with('success', 'Car added successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'vehicle_type' => 'required|in:car,motorcycle,other',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|numeric|min:1900|max:2100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $user->car()->update([
            'vehicle_type' => $request->vehicle_type,
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

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $car = $request->user()->car;

        if ($request->hasFile('image')) {
            if ($car->image && \Storage::disk('public')->exists($car->image)) {
                \Storage::disk('public')->delete($car->image);
            }
            $path = $request->file('image')->store('car_images', 'public');
            $car->image = $path;
            $car->save();
        }

        return back()->with('success', 'Car image updated successfully!');
    }
}

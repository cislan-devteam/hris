<?php

namespace App\Http\Controllers;

use App\Models\ClockIt;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ClockItController extends Controller
{
    // Saves ClockIn Data
    public function clockIn(Request $request)
    {
        $clockIt = new ClockIt();
        $clockIt->user_id = auth()->user()->id;
        $clockIt->date = now();
        $clockIt->clock_in = now();
        $clockIt->save();
            
        return redirect('/clockout');
    }

    // Saves ClockOut Data
    public function clockOut(Request $request)
    {
        $clockIt = ClockIt::where('user_id', auth()->user()->id)
                          ->whereNull('clock_out')
                          ->orderBy('clock_in', 'desc')
                          ->first();

        if ($clockIt) {
            $clockIt->clock_out = now();
            $clockIt->save();

            return redirect('/clockit');
        }

        return redirect()->back()->with('error', 'No active clock-in found');
    }

    // Display Clockin Data
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $records = ClockIt::where('user_id', $user->id)
                              ->orderBy('clock_in', 'desc')
                              ->get();

            $recentRecord = $records->first();

            // Check if the user has already clocked in today
            $hasClockedInToday = $recentRecord && $recentRecord->clock_in->isToday();

            return view('clockit.timein', [
                'records' => $records,
                'hasClockedInToday' => $hasClockedInToday
            ]);

            // Redirect to the login page if no user is authenticated
            // return redirect('login')->with('error', 'You must be logged in to view this page.');
        }
    }

    // Display Clockout Data
    public function timeOut()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $records = ClockIt::where('user_id', $user->id)
                              ->orderBy('clock_in', 'desc')
                              ->get();

            return view('clockit.timeout', compact('records'));

            // Redirect to the login page if no user is authenticated
            // return redirect('login')->with('error', 'You must be logged in to view this page.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ClockIt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
            
        return redirect()->route('clockit.index');
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
        }

        return redirect()->route('clockit.index');
    }

    // Display Clockin Data
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $recentRecord = ClockIt::where('user_id', $user->id)
                                  ->orderBy('clock_in', 'desc')
                                  ->first();
    
            // Check if the user has already clocked in today
            $hasClockedInToday = $recentRecord && $recentRecord->clock_in->isToday();

            // Check if the user has already clocked out today
            $hasClockedOutToday = $recentRecord && $recentRecord->clock_out && $recentRecord->clock_out->isToday();
    
            $records = ClockIt::where('user_id', $user->id)
                              ->orderBy('clock_in', 'desc')
                              ->get();
    
            return view('clockit.timein', [
                'records' => $records,
                'hasClockedInToday' => $hasClockedInToday,
                'hasClockedOutToday' => $hasClockedOutToday,
            ]);
        }
    
        // Redirect to the login page if no user is authenticated
        return redirect('login')->with('error', 'You must be logged in to view this page.');
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

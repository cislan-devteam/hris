<?php

namespace App\Http\Controllers;

use App\Models\ClockIt;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ClockItController extends Controller
{
    
    public function clockIn(Request $request)
    {
        $clockIt = new ClockIt();
        $clockIt->user_id = auth()->user()->id;
        $clockIt->date = now();
        $clockIt->clock_in = now();
        $clockIt->save();

        return redirect()->back()->with('message', 'Clocked in successfully');
    }

    public function clockOut(Request $request)
    {
        $clockIt = ClockIt::where('user_id', auth()->user()->id)
                          ->whereNull('clock_out')
                          ->orderBy('clock_in', 'desc')
                          ->first();

        if ($clockIt) {
            $clockIt->clock_out = now();
            $clockIt->save();

            return redirect()->back()->with('message', 'Clocked out successfully');
        }

        return redirect()->back()->with('error', 'No active clock-in found');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $records = ClockIt::where('user_id', $user->id)
                              ->orderBy('clock_in', 'desc')
                              ->get();

            return view('clockit.index', compact('records'));

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

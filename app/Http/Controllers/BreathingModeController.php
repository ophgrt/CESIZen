<?php

namespace App\Http\Controllers;
use App\Models\BreathingMode;

class BreathingModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('breathing-modes.index', [
            'breathingModes' => BreathingMode::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBreathingModeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BreathingMode $breathingMode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BreathingMode $breathingMode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBreathingModeRequest $request, BreathingMode $breathingMode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BreathingMode $breathingMode)
    {
        //
    }
}

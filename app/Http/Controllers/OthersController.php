<?php

namespace App\Http\Controllers;

use App\Models\Others;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'asset_class' => 'required|string|max:100',
            'asset_no' => 'required|string|max:100',
            'asset_description' => 'required|string|max:100',
            'acquisition_date' => 'required|date',
            'new_fixed_asset_no' => 'required|string|max:100',
        ]);

        Others::create([
            'asset_class' => $request->asset_class,
            'asset_no' => $request->asset_no,
            'asset_description' => $request->asset_description,
            'acquisition_date' => $request->acquisition_date,
            'new_fixed_asset_no' => $request->new_fixed_asset_no,
        ]);

        notify()->success('Other category created successfully!');
        return redirect()->route('assets.others-form');
    }

    /**
     * Display the specified resource.
     */
    public function show(Others $others)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Others $others)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Others $others)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Others $others)
    {
        $others->delete();

        notify()->success('Other category deleted successfully!');
        return redirect()->route('assets.others-form');
    }
}

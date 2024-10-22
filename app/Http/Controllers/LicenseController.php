<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
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
    public function create(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'license_number' => 'required|string|max:150',
            'expiry_date' => 'required|date',
        ]);

        try {
            License::create([
                'license_number' => $request->license_number,
                'expiry_date' => $request->expiry_date,
            ]);

            notify()->success('License created successfully!');
            return redirect()->route('assets.license-form');
        } catch (\Exception $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(License $license)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(License $license)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, License $license)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(License $license)
    {
        $license = $license->delete();

        if ($license) {
            notify()->success('License deleted successfully.');
        } else {
            notify()->error('Failed to delete license.');
        }
        return redirect()->back();
    }
}

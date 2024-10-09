<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
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
            'brand' => 'required|string|max:50',
            'size' => 'required|string|max:50',
            'resolution' => 'required|string|max:50',
        ]);

        try {
            Monitor::create([
                'brand' => $request->brand,
                'size' => $request->size,
                'resolution' => $request->resolution,
            ]);
            notify()->success('Monitor created successfully.');
            return redirect()->back();
        } catch (\Exception $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Monitor $monitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitor $monitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitor $monitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitor $monitor)
    {
        $monitor = $monitor->delete();

        if ($monitor) {
            notify()->success('Monitor deleted successfully.');
        } else {
            notify()->error('Failed to delete monitor.');
        }
        return redirect()->back();
    }
}

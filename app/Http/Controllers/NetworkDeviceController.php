<?php

namespace App\Http\Controllers;

use App\Models\NetworkDevice;
use Illuminate\Http\Request;

class NetworkDeviceController extends Controller
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
        // Validasi input
        $request->validate([
            'device_type' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'brand' => 'required|string|max:50',
            'serial_number' => 'required|string|max:50',
            'ip_address' => 'nullable|string|max:50',
        ]);

        try {
            NetworkDevice::create([
                'device_type' => $request->device_type,
                'model' => $request->model,
                'brand' => $request->brand,
                'serial_number' => $request->serial_number, // Pastikan kolom ini ada
                'ip_address' => $request->ip_address,
            ]);

            notify()->success('Network Device created successfully!');
            return redirect()->route('assets.network-device-form');
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NetworkDevice $networkDevice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NetworkDevice $networkDevice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NetworkDevice $networkDevice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NetworkDevice $network_devices)
    {
        $network_devices = $network_devices->delete();

        if ($network_devices) {
            notify()->success('Network Device deleted successfully.');
        } else {
            notify()->error('Failed to delete Network Device.');
        }
        return redirect()->back();
    }
}

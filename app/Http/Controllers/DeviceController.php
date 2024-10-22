<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('assets.devices-form');
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
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|integer|min:1',
            'storage' => 'required|integer|min:1',
            'serial_number' => 'required|string|max:255|unique:pcs_laptops',
            'notes' => 'nullable|string',
        ]);

        Device::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'serial_number' => $request->serial_number,
            'notes' => $request->notes,
        ]);

        notify()->success('PC/Laptop created successfully!');
        return redirect()->route('assets.devices-form');
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pcLaptop = Device::findOrFail($id);
        return view('pcs_laptops.edit', compact('pcLaptop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|integer|min:1',
            'storage' => 'required|integer|min:1',
            'serial_number' => 'required|string|max:255|unique:pcs_laptops,serial_number,' . $id,
            'notes' => 'nullable|string',
        ]);

        $pcLaptop = Device::findOrFail($id);
        $pcLaptop->update($request->all());

        return redirect()->route('pcs_laptops.index')->with('success', 'PC/Laptop updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pcLaptop = Device::findOrFail($id);
        // Log
        Log::info('Deleting PC/Laptop with ID: ' . $pcLaptop->id);
        $pcLaptop->delete();

        return redirect()->route('pcs_laptops.index')->with('success', 'PC/Laptop deleted successfully.');
    }
}

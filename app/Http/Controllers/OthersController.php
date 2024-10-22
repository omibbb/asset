<?php

namespace App\Http\Controllers;

use App\Models\Others;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

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
        // Validasi input
        $request->validate([
            'asset_class' => 'required|string|max:100',
            'asset_no' => 'required|string|max:100|unique:inventory,asset_no',
            'asset_description' => 'required|string|max:255',
            'acquisition_date' => 'required|date',
            'new_fixed_asset_no' => 'required|string|max:100|unique:inventory,new_fixed_asset_no',
            'serial_number' => 'nullable|string|max:100|unique:inventory,serial_number',
            'location' => 'nullable|string|max:50',
        ]);

        // Cek apakah asset_no sudah ada di database
        $existingAsset = Others::where('asset_no', $request->asset_no)->first();

        if ($existingAsset) {
            Log::warning('Attempt to create a duplicate asset_no: ' . $request->asset_no);
            notify()->error('Asset number already exists! Please use a different asset number.');
            return redirect()->back()->withInput();
        }

        // Simpan data
        try {
            Others::create([
                'asset_class' => $request->asset_class,
                'asset_no' => $request->asset_no,
                'asset_description' => $request->asset_description,
                'acquisition_date' => $request->acquisition_date,
                'new_fixed_asset_no' => $request->new_fixed_asset_no,
                'serial_number' => $request->serial_number,
                'location' => $request->location,
            ]);

            Log::info('Successfully created asset: ' . $request->asset_no);
            notify()->success('Other category created successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to create asset: ' . $e->getMessage());
            notify()->error('Failed to create Other category. Please try again.');
            return redirect()->back()->withInput();
        }

        return redirect()->route('assets.others-form');
    }

    /**
     * Display the specified resource.
     */
    public function show(Others $others) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asset = Others::findOrFail($id); // Mengambil data asset berdasarkan ID
        return view('content.asset-pages.others', compact('asset')); // Tampilkan formulir edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'asset_class' => 'required|string|max:100',
            'asset_no' => 'required|string|max:100|unique:inventory,asset_no,' . $id,
            'asset_description' => 'required|string|max:255',
            'acquisition_date' => 'required|date',
            'new_fixed_asset_no' => 'required|string|max:100|unique:inventory,new_fixed_asset_no,' . $id,
            'serial_number' => 'nullable|string|max:100|unique:inventory,serial_number,' . $id,
            'location' => 'nullable|string|max:50',
        ]);

        // Dapatkan asset yang akan diupdate
        $asset = Others::findOrFail($id);

        // Simpan nilai sebelum perubahan
        $originalData = $asset->getOriginal();

        // Update data asset
        $asset->update($request->all());

        // Log activity secara otomatis akan ditangani oleh observer

        // Simpan perubahan setelah update
        $changedData = $asset->getChanges();

        notify()->success('Asset updated successfully!');

        // Redirect dengan notifikasi sukses
        return redirect()->route('assets.add-assets')->with('success', 'Asset updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Others $others)
    {
        try {
            // Hapus asset
            $others->delete();

            notify()->success('Other category deleted successfully!');
            Log::info('Asset deleted successfully for asset ID: ' . $others->id);
        } catch (\Exception $e) {
            Log::error('Failed to delete asset: ' . $e->getMessage());
            notify()->error('Failed to delete Other category. Please try again.');
            return redirect()->back();
        }

        return redirect()->route('assets.others-form');
    }
}

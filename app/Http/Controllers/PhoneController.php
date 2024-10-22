<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
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
        // Validasi input yang dikirim dari form
        $request->validate([
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'ram' => 'required|numeric',
            'storage' => 'required|numeric',
            'imei' => 'required|string|max:20|unique:phones,imei', // Menambahkan aturan unique pada IMEI
            'battery_capacity' => 'required|numeric',
        ]);

        try {
            // Simpan data phone ke dalam database
            Phone::create([
                'brand' => $request->brand,
                'model' => $request->model,
                'ram' => $request->ram,
                'storage' => $request->storage,
                'imei' => $request->imei,
                'battery_capacity' => $request->battery_capacity,
            ]);

            // Jika berhasil, berikan notifikasi sukses
            notify()->success('Phone created successfully.');
            return redirect()->route('assets.phone-form');
        } catch (\Exception $e) {
            // Jika gagal, berikan notifikasi error dan redirect kembali ke form dengan data yang diinput
            notify()->error('Error creating phone: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        $phone = $phone->delete();

        if ($phone) {
            notify()->success('Phone deleted successfully.');
        } else {
            notify()->error('Failed to delete phone.');
        }
        return redirect()->back();
    }
}

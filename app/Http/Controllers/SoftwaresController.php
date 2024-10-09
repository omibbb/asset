<?php

namespace App\Http\Controllers;

use App\Models\Softwares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SoftwaresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('assets.software-form');
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
        // Validasi data yang dikirim dari form
        $request->validate([
            'name' => 'required|string|max:100',
            'version' => 'required|string|max:50',
            'license_key' => 'required|string|max:50',
            'buying_date' => 'required|date',
            'expiry_date' => 'required|date|after:buying_date',
        ]);

        // Simpan data software ke dalam database
        Softwares::create([
            'name' => $request->name,
            'version' => $request->version,
            'license_key' => $request->license_key,
            'buying_date' => $request->buying_date,
            'expiry_date' => $request->expiry_date,
        ]);

        // Notifikasi jika berhasil
        notify()->success('Software created successfully!');

        // Redirect kembali ke halaman form
        return redirect()->route('assets.software-form');
    }

    /**
     * Display the specified resource.
     */
    public function show(Softwares $softwares)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Softwares $softwares)
    {
        $softId = Softwares::findOrFail($softwares->id);
        return view('softwares.edit', compact('softId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Softwares $softwares)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Softwares $softwares)
    {
        $softwares = $softwares->delete();

        if ($softwares) {
            notify()->success('Software deleted successfully.');
        } else {
            notify()->error('Failed to delete software.');
        }
        return redirect()->back();
    }
}

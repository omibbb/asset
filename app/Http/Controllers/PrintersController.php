<?php

namespace App\Http\Controllers;

use App\Models\Printers;
use Illuminate\Http\Request;

class PrintersController extends Controller
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
            'type' => 'required|string|max:50',
            'ink_type' => 'required|string|max:50',
        ]);

        try {
            Printers::create([
                'brand' => $request->brand,
                'type' => $request->type,
                'ink_type' => $request->ink_type,
            ]);
            notify()->success('Printer created successfully!');
            return redirect()->route('assets.printers-form');
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to create printer.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Printers $printers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Printers $printers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Printers $printers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Printers $printers)
    {
        $printers = $printers->delete();

        if ($printers) {
            notify()->success('Printer deleted successfully.');
        } else {
            notify()->error('Failed to delete printer.');
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;

class BarcodeController extends Controller
{
    public function create()
    {
        return view('content.barcode.create-barcode'); // View untuk membuat asset baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_name' => 'required|string|max:255',
            'asset_description' => 'nullable|string|max:255',
        ]);

        // Membuat asset baru di database
        $asset = Asset::create([
            'name' => $request->asset_name,
            'description' => $request->asset_description,
        ]);

        // Menghasilkan QR Code dengan Endroid
        $qrCodeContent = $asset->id;
        // $qrCodeContent = route('assets.view', ['id' => $asset->id]);

        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrCodeContent)
            ->size(300)
            ->margin(10)
            ->build();

        // Tentukan path tempat menyimpan QR Code
        $directoryPath = public_path('storage/qr-codes');
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
        $filePath = $directoryPath . '/' . $asset->id . '.png';

        // Simpan QR Code ke file
        $result->saveToFile($filePath);

        // Simpan path QR Code di database
        $asset->qr_code_path = 'storage/qr-codes/' . $asset->id . '.png';
        $asset->save();

        if ($asset) {
            notify()->success('QR Code generated successfully!');
            return redirect()->route('barcode.create');
        } else {
            notify()->error('Failed to generate QR Code.');
            return redirect()->route('barcode.create');
        }
    }

    public function view($id)
    {
        $asset = Asset::findOrFail($id);
        return view('content.barcode.view-barcode', compact('asset'));
    }

    // app/Http/Controllers/AssetController.php

    public function manage()
    {
        $barcodes = Asset::all(); // Ambil semua data asset
        $assets = Asset::whereNotNull('qr_code_path')->get(); // Mengambil semua aset yang memiliki QR Code
        return view('content.barcode.manage-barcode', compact('barcodes', 'assets'));
    }


    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);

        // Hapus QR code file jika ada
        if ($asset->qr_code_path) {
            Storage::delete($asset->qr_code_path);
        }

        $asset->delete();

        // Check if asset was deleted successfully
        if (!$asset) {
            notify()->error('Failed to delete asset.');
            return redirect()->route('barcode.manage');
        } else {
            notify()->success('Asset deleted successfully.');
            return redirect()->route('barcode.manage');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;
use App\Models\Softwares;
use App\Models\Phone;
use App\Models\NetworkDevice;
use App\Models\License;
use App\Models\Monitor;
use App\Models\Others;
use App\Models\Printers;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Barryvdh\DomPDF\Facade\Pdf;

class AssetController extends Controller
{
    public function index(Request $request, User $user)
    {
        $assets = Asset::all();
        return view('content.asset-pages.tables-list-assets', compact('assets'));
    }

    public function create(Request $request)
    {
        //  Total
        $deviceTotal = Device::count();
        $softwareTotal = Softwares::count();
        $phonesTotal = Phone::count();
        $networkDeviceTotal = NetworkDevice::count();
        $licenseTotal = License::count();
        $monitorTotal = Monitor::count();
        $printersTotal = Printers::count();
        $othersTotal = Others::count();

        $totalAssets = $deviceTotal + $softwareTotal + $phonesTotal + $networkDeviceTotal + $licenseTotal + $monitorTotal + $printersTotal + $othersTotal;

        // Mengambil semua data dari setiap tabel
        $devices = Device::all();
        $softwares = Softwares::all();
        $phones = Phone::all();
        $networkDevices = NetworkDevice::all();
        $monitors = Monitor::all();
        $licenses = License::all();
        $printers = Printers::all();
        $others = Others::all();
        // Tabel lainnya bisa ditambahkan sesuai kebutuhan...

        // Gabungkan semua data menjadi satu
        $allAssets = collect()
            ->merge($devices)
            ->merge($softwares)
            ->merge($phones)
            ->merge($networkDevices)
            ->merge($monitors)
            ->merge($licenses)
            ->merge($printers)
            ->merge($others)
            ->all();

        // Mengirimkan semua data ke view
        return view(
            'content.asset-pages.add-assets',
            compact(
                'totalAssets',
                'allAssets',
                'deviceTotal',
                'softwareTotal',
                'phonesTotal',
                'networkDeviceTotal',
                'licenseTotal',
                'monitorTotal',
                'printersTotal',
                'othersTotal'
            )
        );
    }

    public function generateQr($type, $id)
    {
        // Dapatkan aset berdasarkan tipe dan ID
        $assetModel = '\\App\\Models\\' . ucfirst($type); // Pastikan namespace sudah benar
        $asset = $assetModel::findOrFail($id);

        // Generate QR Code dengan informasi yang relevan
        $qrCode = new QrCode("Asset: {$asset->name} - Serial: {$asset->serial_number}");
        $writer = new PngWriter();

        // Tentukan path untuk menyimpan QR Code
        $qrPath = public_path("storage/qr-codes/{$type}_{$id}.png");

        // Check jika tidak ada folder qr-codes maka buat
        if (!file_exists(public_path("storage/qr-codes"))) {
            mkdir(public_path("storage/qr-codes"), 0777, true);
        }

        // Simpan QR Code ke file
        $writer->write($qrCode)->saveToFile($qrPath);

        // Simpan informasi QR Code ke database
        $asset->qr_code_path = "storage/qr-codes/{$type}_{$id}.png"; // Simpan path QR Code
        $asset->save(); // Simpan ke database

        // Kembalikan respons JSON dengan path QR code
        return response()->json([
            'qr_code_path' => asset("storage/qr-codes/{$type}_{$id}.png") // Gunakan asset() untuk URL yang bisa diakses di frontend
        ]);
    }

    // Generate Labels for assets
    public function generatePdf($id)
    {
        // Ambil asset berdasarkan ID
        $asset = Others::find($id);

        // Jika asset tidak ditemukan, kembalikan error
        if (!$asset) {
            notify()->error('Asset not found.');
            return redirect()->back();
        }

        // Mendapatkan path gambar QR Code
        $imagePath = public_path($asset->qr_code_path);

        // Periksa apakah gambar ada
        if (!file_exists($imagePath)) {
            notify()->error('QR Code not found.');
            return redirect()->back();
        }

        // Mengubah gambar menjadi base64
        $imageData = base64_encode(file_get_contents($imagePath));
        $src = 'data:' . mime_content_type($imagePath) . ';base64,' . $imageData;

        // Memuat view PDF tanpa mengatur opsi
        $pdf = Pdf::loadView('pdf.pdf_layout', compact('asset', 'src'));

        // Mengunduh PDF
        return $pdf->download('Asset_' . $asset->asset_no . '.pdf');
    }

    public function getDetail($type, $id)
    {
        $assetModel = '\\App\\Models\\' . ucfirst($type);
        $asset = $assetModel::findOrFail($id);

        $response = [
            'type' => class_basename($asset),
        ];

        if ($type === 'device') {
            $response = array_merge($response, [
                'name' => $asset->name,
                'version' => $asset->version,
                'license_key' => $asset->license_key,
                'buying_date' => $asset->buying_date,
                'expiry_date' => $asset->expiry_date,
            ]);
        } else if ($type === 'software') {
            $response = array_merge($response, [
                'name' => $asset->name,
                'version' => $asset->version,
                'license_key' => $asset->license_key,
                'buying_date' => $asset->buying_date,
                'expiry_date' => $asset->expiry_date,
            ]);
        } else if ($type === 'phone') {
            $response = array_merge($response, [
                'imei' => $asset->imei,
                'brand' => $asset->brand,
                'model' => $asset->model,
                'storage' => $asset->storage,
                'ram' => $asset->ram,
                'processor' => $asset->processor,
                'os' => $asset->os,
            ]);
        } else if ($type === 'networkdevice') {
            $response = array_merge($response, [
                'name' => $asset->name,
                'brand' => $asset->brand,
                'model' => $asset->model,
                'serial_number' => $asset->serial_number,
                'buying_date' => $asset->buying_date,
                'expiry_date' => $asset->expiry_date,
            ]);
        } else if ($type === 'monitor') {
            $response = array_merge($response, [
                'name' => $asset->name,
                'brand' => $asset->brand,
                'model' => $asset->model,
                'serial_number' => $asset->serial_number,
                'buying_date' => $asset->buying_date,
                'expiry_date' => $asset->expiry_date,
            ]);
        } else if ($type === 'license') {
            $response = array_merge($response, [
                'name' => $asset->name,
                'version' => $asset->version,
                'license_key' => $asset->license_key,
                'buying_date' => $asset->buying_date,
                'expiry_date' => $asset->expiry_date,
            ]);
        } else if ($type === 'printers') {
            $response = array_merge($response, [
                'name' => $asset->name,
                'brand' => $asset->brand,
                'model' => $asset->model,
                'serial_number' => $asset->serial_number,
                'buying_date' => $asset->buying_date,
                'expiry_date' => $asset->expiry_date,
            ]);
        } else if ($type === 'others') {
            $response = array_merge($response, [
                'asset_class' => $asset->asset_class,
                'asset_no' => $asset->asset_no,
                'asset_description' => $asset->asset_description,
                'acquisition_date' => $asset->acquisition_date,
                'new_fixed_asset_no' => $asset->new_fixed_asset_no,
                'serial_number' => $asset->serial_number,
                'location' => $asset->location,
            ]);
        }

        return response()->json($response);
    }

    public function getByBarcode($barcode)
    {
        // Cek di tabel software
        $software = Softwares::where('license_key', $barcode)->first();
        if ($software) {
            return response()->json([
                'id' => $software->id,
                'type' => 'software',
            ]);
        }

        // Cek di tabel phone
        $phone = Phone::where('imei', $barcode)->first();
        if ($phone) {
            return response()->json([
                'id' => $phone->id,
                'type' => 'phone',
            ]);
        }

        // Cek di tabel others
        $others = Others::where('new_fixed_asset_no', $barcode)->first();
        if ($others) {
            return response()->json([
                'id' => $others->id,
                'type' => 'others',
            ]);
        }

        // Tambahkan pengecekan untuk kategori lainnya...

        // Jika tidak ditemukan, return error
        return response()->json(['error' => 'Asset tidak ditemukan!'], 404);
    }

    public function device()
    {
        return view('content.asset-pages.device');
    }

    public function software()
    {
        return view('content.asset-pages.software');
    }

    public function phoneDevice()
    {
        return view('content.asset-pages.phone');
    }

    public function networkDevice()
    {
        return view('content.asset-pages.network-device');
    }
    public function monitor()
    {
        return view('content.asset-pages.monitor');
    }
    public function license()
    {
        return view('content.asset-pages.license');
    }
    public function printers()
    {
        return view('content.asset-pages.printers');
    }

    public function otherCategory()
    {
        return view('content.asset-pages.others');
    }

    public function delete($type, $id)
    {
        switch (strtolower($type)) {
            case 'device':
                $asset = Device::findOrFail($id);
                break;
            case 'softwares':
                $asset = Softwares::findOrFail($id);
                break;
            case 'phone':
                $asset = Phone::findOrFail($id);
                break;
            case 'networkdevice':
                $asset = NetworkDevice::findOrFail($id);
                break;
            case 'monitor':
                $asset = Monitor::findOrFail($id);
                break;
            case 'license':
                $asset = License::findOrFail($id);
                break;
            case 'printers':
                $asset = Printers::findOrFail($id);
                break;
            case 'others':
                $asset = Others::findOrFail($id);
                break;
            default:
                abort(404); // Jika type tidak ditemukan, akan 404
        }

        $asset->delete();

        // Jika sukses beri notifikasi
        if ($asset) {
            notify()->success('Asset deleted successfully.');
        } else {
            notify()->error('Failed to delete asset.');
        }
        return redirect()->back();
    }
}

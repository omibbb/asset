<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkDevice extends Model
{
    use HasFactory;

    protected $table = 'network_devices';

    protected $fillable = [
        'device_type',
        'model',
        'brand',
        'serial_number', // Tambahkan kolom ini
        'ip_address',
    ];
}

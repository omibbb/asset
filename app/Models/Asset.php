<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'barcode',
        'status',
        'code'
        // Tambahkan kolom lain yang juga ingin diizinkan untuk mass assignment
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($asset) {
            // Generate kode yang unik
            do {
                $asset->code = 'ASSET-' . strtoupper(Str::random(8) . '-ITK'); // Menghasilkan kode acak
            } while (self::where('code', $asset->code)->exists()); // Cek duplikasi
        });
    }
}

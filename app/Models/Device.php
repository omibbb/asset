<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'pcs_laptops';

    protected $fillable = [
        'name',
        'brand',
        'model',
        'processor',
        'ram',
        'storage',
        'notes',
        'serial_number'
    ];
}

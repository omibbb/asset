<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Others extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $fillable = [
        'asset_class',
        'asset_no',
        'asset_description',
        'acquisition_date',
        'new_fixed_asset_no',
        'serial_number',
        'location'
    ];
}

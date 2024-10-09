<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Softwares extends Model
{
    use HasFactory;

    protected $table = 'softwares';

    protected $fillable = [
        'name',
        'version',
        'license_key',
        'buying_date',
        'expiry_date',
    ];
}

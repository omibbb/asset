<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printers extends Model
{
    use HasFactory;

    protected $table = 'printers';

    protected $fillable = [
        'brand',
        'type',
        'ink_type',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shuffle extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'value',
        'coins',
        'mobile_image',
    ];
}

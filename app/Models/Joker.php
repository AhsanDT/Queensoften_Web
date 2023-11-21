<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joker extends Model
{
    use HasFactory;
    protected $fillable =[
      'image',
      'name',
      'coins',
        'type',
        'mobile_image'
    ];
}

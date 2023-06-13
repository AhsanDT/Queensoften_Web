<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareApp extends Model
{
    use HasFactory;
    protected $fillable = [
      'ios_link','android_link','prize_id','quantity'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'l-name',
        'phone',
        'notes',
        'address',
        'apartment',
        'zip',
        'country',
        'location',
        'user_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guideline extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'terms_and_condition',
        'about_us',
        'faqs'
    ];
}

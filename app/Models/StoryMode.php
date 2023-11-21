<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryMode extends Model
{
    use HasFactory;
    protected $fillable = [
      'image',
      'mobile_image',
      'title',
      'description',
      'start_date',
      'end_date',
    ];
}

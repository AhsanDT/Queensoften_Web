<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'game_type',
        'won',
        'lost',
        'date',
        'time',
        'score',
        'user_id'
    ];
    protected $casts = [
        'date' => 'datetime',
    ];

}

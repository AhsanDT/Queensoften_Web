<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'challenge_id',
        'type',
        'sub_type',
    ];
    // Inside ChallengeAttachment model
    public function challenge()
    {
        return $this->belongsTo(Challenge::class, 'challenge_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use HasFactory,SoftDeletes;
    protected $softDelete = true;
    protected $table = 'challenges';
    protected $dates = ['deleted_at'];

    function hasPrize(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Prize::class,'id','prize_id');
    }
    function achievements(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Achievement::class,'challenge_id','id');
    }
    // Inside Challenge model
    public function special_cards()
    {
        return $this->hasMany(ChallengeAttachment::class, 'challenge_id');
    }

}

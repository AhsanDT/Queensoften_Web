<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeckAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'deck_id',
        'image',
        'img_type',
        'img_sub_type',
    ];
    public function deck(){
        return $this->belongsTo(Deck::class);
    }
}

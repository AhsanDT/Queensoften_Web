<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'coins',
      'image',
      'joker_image',
    ];
    public function deckAttachment(){
        return $this->hasMany(DeckAttachment::class,'deck_id');
    }
}

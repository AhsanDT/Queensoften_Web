<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeckRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image'=>'required|mimes:jpeg,jpg,png',
            'mobile_image'=>'required|mimes:jpeg,jpg,png',
            'title'=>'required',
            'coins'=>'required|numeric',
            'joker_image'=>'required',
            'spade_king'=>'required|mimes:jpeg,jpg,png',
            'spade_queen'=>'required|mimes:jpeg,jpg,png',
            'spade_jack'=>'required|mimes:jpeg,jpg,png',
            'spade_ace'=>'required|mimes:jpeg,jpg,png',
//            'spade_1'=>'required|mimes:jpeg,jpg,png',
            'spade_2'=>'required|mimes:jpeg,jpg,png',
            'spade_3'=>'required|mimes:jpeg,jpg,png',
            'spade_4'=>'required|mimes:jpeg,jpg,png',
            'spade_5'=>'required|mimes:jpeg,jpg,png',
            'spade_6'=>'required|mimes:jpeg,jpg,png',
            'spade_7'=>'required|mimes:jpeg,jpg,png',
            'spade_8'=>'required|mimes:jpeg,jpg,png',
            'spade_9'=>'required|mimes:jpeg,jpg,png',
            'spade_10'=>'required|mimes:jpeg,jpg,png',
            'heart_king'=>'required|mimes:jpeg,jpg,png',
            'heart_queen'=>'required|mimes:jpeg,jpg,png',
            'heart_jack'=>'required|mimes:jpeg,jpg,png',
            'heart_ace'=>'required|mimes:jpeg,jpg,png',
//            'heart_1'=>'required|mimes:jpeg,jpg,png',
            'heart_2'=>'required|mimes:jpeg,jpg,png',
            'heart_3'=>'required|mimes:jpeg,jpg,png',
            'heart_4'=>'required|mimes:jpeg,jpg,png',
            'heart_5'=>'required|mimes:jpeg,jpg,png',
            'heart_6'=>'required|mimes:jpeg,jpg,png',
            'heart_7'=>'required|mimes:jpeg,jpg,png',
            'heart_8'=>'required|mimes:jpeg,jpg,png',
            'heart_9'=>'required|mimes:jpeg,jpg,png',
            'heart_10'=>'required|mimes:jpeg,jpg,png',
            'diamond_king'=>'required|mimes:jpeg,jpg,png',
            'diamond_queen'=>'required|mimes:jpeg,jpg,png',
            'diamond_jack'=>'required|mimes:jpeg,jpg,png',
            'diamond_ace'=>'required|mimes:jpeg,jpg,png',
//            'diamond_1'=>'required|mimes:jpeg,jpg,png',
            'diamond_2'=>'required|mimes:jpeg,jpg,png',
            'diamond_3'=>'required|mimes:jpeg,jpg,png',
            'diamond_4'=>'required|mimes:jpeg,jpg,png',
            'diamond_5'=>'required|mimes:jpeg,jpg,png',
            'diamond_6'=>'required|mimes:jpeg,jpg,png',
            'diamond_7'=>'required|mimes:jpeg,jpg,png',
            'diamond_8'=>'required|mimes:jpeg,jpg,png',
            'diamond_9'=>'required|mimes:jpeg,jpg,png',
            'diamond_10'=>'required|mimes:jpeg,jpg,png',
            'club_king'=>'required|mimes:jpeg,jpg,png',
            'club_queen'=>'required|mimes:jpeg,jpg,png',
            'club_jack'=>'required|mimes:jpeg,jpg,png',
            'club_ace'=>'required|mimes:jpeg,jpg,png',
//            'club_1'=>'required|mimes:jpeg,jpg,png',
            'club_2'=>'required|mimes:jpeg,jpg,png',
            'club_3'=>'required|mimes:jpeg,jpg,png',
            'club_4'=>'required|mimes:jpeg,jpg,png',
            'club_5'=>'required|mimes:jpeg,jpg,png',
            'club_6'=>'required|mimes:jpeg,jpg,png',
            'club_7'=>'required|mimes:jpeg,jpg,png',
            'club_8'=>'required|mimes:jpeg,jpg,png',
            'club_9'=>'required|mimes:jpeg,jpg,png',
            'club_10'=>'required|mimes:jpeg,jpg,png',
        ];
    }
}

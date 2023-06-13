<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatsApiRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date'=>'required',
            'game_type'=>'required',
        ];
    }
}

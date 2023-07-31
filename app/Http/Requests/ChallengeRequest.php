<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallengeRequest extends FormRequest
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
            'date'=> 'required|date_format:Y-m-d',
            'hour' => 'required|numeric|min:0|max:24',
            'minute' => 'required|numeric|min:0|max:60',
            'title' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'games' => 'required|numeric',
            'days' => 'required',
            'occurrence' => 'required',
            'prize' => 'required',
            'quantity'=>'required|numeric',
            'deck'=>'required'
        ];
    }
    public function messages()
    {
        return [
                'title.regex' => 'The title must have alphabetic and numeric value'
            ];
    }
}

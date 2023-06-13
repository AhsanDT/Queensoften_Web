<?php

namespace App\Http\Requests;


class AuthApiRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required_if:driver,==,google,facebook',
            'email' => 'required_if:driver,==,google,facebook',
        ];
    }


}

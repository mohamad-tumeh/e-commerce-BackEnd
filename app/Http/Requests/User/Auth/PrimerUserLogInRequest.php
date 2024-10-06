<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PrimerUserLogInRequest extends FormRequest
{

    public function rules()
    {
        return [

            'email' => 'required_without:phone_number|email',
            'phone_number' => 'required_without:email',
            'password' => 'required',
            'device_token'  =>    'nullable'
        ];
    }
}

<?php

namespace App\Http\Requests\RegisterSocialate;

use Illuminate\Foundation\Http\FormRequest;

class RegisterOrLoginRequest extends FormRequest
{

    public function rules()
    {
        return [
            'id_socialite'     => 'required|string',
            'name'             => 'required|string',
            'email'            => 'required|email',
            'token'            => 'required|string',
            'device_token'     => 'required|string',
            'is_block'         => 'nullable'
        ];
    }
}

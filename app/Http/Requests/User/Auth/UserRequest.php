<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\ApiFormRequest;
use App\Rules\Recaptcha;

class UserRequest extends ApiFormRequest
{
    public function rules(): array
    {

        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required_without:phone_number|email|unique:users',
            'phone_number' => 'required_without:email|numeric|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required',
            'birthday' => 'required',
            'e_letter_service' => 'required',
            'sms' => 'required',
            'device_token'  =>   'required|string'
        ];
    }
}

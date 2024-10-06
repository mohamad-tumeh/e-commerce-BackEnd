<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserLogInRequest extends ApiFormRequest
{
    public function rules(): array
    {

        return [
            'email' => 'required_without:phone_number|email',
            'phone_number' => 'required_without:email',
            'password' => 'required|string|min:8',
            'device_token'  =>    'required'
        ];
    }
}

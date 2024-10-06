<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'phone_number' => 'required|exists:users',
            'password' => 'required|string|min:8',
        ];
    }
}

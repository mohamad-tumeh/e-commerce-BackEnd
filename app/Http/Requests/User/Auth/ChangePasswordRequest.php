<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'phone_number' => 'required'
        ];
    }
}

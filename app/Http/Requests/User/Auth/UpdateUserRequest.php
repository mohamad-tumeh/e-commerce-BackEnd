<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\ApiFormRequest;

class UpdateUserRequest extends ApiFormRequest
{
    public function rules(): array
    {

        return [
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'password' => 'nullable|string|min:8',
            'gender' => 'nullable',
            'birthday' => 'nullable',
            'e_letter_service' => 'nullable',
            'sms' => 'nullable',
            'language_id' => 'nullable',
            'is_block'   => 'nullable|boolean'
        ];
    }
}

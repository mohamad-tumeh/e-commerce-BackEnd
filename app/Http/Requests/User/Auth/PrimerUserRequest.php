<?php

namespace App\Http\Requests\User\Auth;


use App\Http\Requests\ApiFormRequest;

class PrimerUserRequest extends ApiFormRequest
{
    public function rules(): array
    {

        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required_without:phone_number|email|unique:primer_users',
            'phone_number' => 'required_without:email|numeric|unique:primer_users',
            'password' => 'required|string|min:8',
            'type_id' => 'required|integer',
            'store_id' => 'nullable|integer',
            'device_token'  =>  'required|string'
        ];
    }
}

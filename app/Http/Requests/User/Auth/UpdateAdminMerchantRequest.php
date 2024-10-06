<?php

namespace App\Http\Requests\User\Auth;


use App\Http\Requests\ApiFormRequest;

class UpdateAdminMerchantRequest extends ApiFormRequest
{
    public function rules(): array
    {

        return [
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'password' => 'nullable|string|min:8',
            'phone_number' => 'nullable|numeric',
            'store_id' => 'nullable|integer',
        ];
    }
}

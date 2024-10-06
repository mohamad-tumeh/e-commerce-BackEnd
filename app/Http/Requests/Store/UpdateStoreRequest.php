<?php

namespace App\Http\Requests\Store;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'an_name' => 'nullable|string',
            'post_code' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,bmp',
            'cover' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,bmp',
            'phone_number' => 'nullable|string',
            'bank_account_number' => 'nullable|string',
            'store_status_id' => 'nullable|integer',
            'city_id' => 'nullable|integer',
            'language_id' => 'nullable|integer',
        ];
    }
}

<?php

namespace App\Http\Requests\Store;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class  AddStoreRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'an_name' => 'required|string',
            'post_code' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,bmp',
            'cover' => 'required|image|mimes:jpg,png,jpeg,gif,svg,bmp',
            'phone_number' => 'required|string',
            'bank_account_number' => 'required|string',
            'city_id' => 'required|integer',
            'language_id' => 'required|integer',
        ];
    }
}

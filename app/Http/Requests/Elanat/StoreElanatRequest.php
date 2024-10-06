<?php

namespace App\Http\Requests\Elanat;

use App\Http\Requests\ApiFormRequest;

class StoreElanatRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,bmp',
            'store_id' => 'required|integer',
        ];
    }
}

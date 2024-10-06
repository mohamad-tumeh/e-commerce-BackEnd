<?php

namespace App\Http\Requests\Elanat;

use App\Http\Requests\ApiFormRequest;

class UpdateElanatRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,bmp',
            'store_id' => 'nullable|integer',
        ];
    }
}

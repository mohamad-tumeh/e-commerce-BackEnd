<?php

namespace App\Http\Requests\Product\Type;

use App\Http\Requests\ApiFormRequest;
class StoreTypeRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'type' => 'required|array',
            'an_type' => 'required|array',
            'price' => 'required|array'
        ];
    }
}

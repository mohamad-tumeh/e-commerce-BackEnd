<?php

namespace App\Http\Requests\Product\Type;

use App\Http\Requests\ApiFormRequest;

class UpdateTypeRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'type' => 'array',
            'an_type' => 'array',
            'price' => 'array',
        ];
    }
}

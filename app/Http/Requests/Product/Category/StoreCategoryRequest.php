<?php

namespace App\Http\Requests\Product\Category;

use App\Http\Requests\ApiFormRequest;

class StoreCategoryRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'category' => 'required|string',
            'an_category' => 'required|string'
        ];
    }
}

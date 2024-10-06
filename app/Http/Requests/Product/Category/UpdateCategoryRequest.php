<?php

namespace App\Http\Requests\Product\Category;

use App\Http\Requests\ApiFormRequest;

class UpdateCategoryRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'category' => 'nullable|string',
            'an_category' => 'nullable|string'
        ];
    }
}

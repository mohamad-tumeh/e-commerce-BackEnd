<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\ApiFormRequest;

class UpdateProductRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'description'         =>    'nullable',
            'name'                   =>    'nullable',
            'an_description'      =>    'nullable',
            'an_name'               =>    'nullable',
            'price_product'               =>    'nullable',
            'image'               =>    'nullable|image|mimes:jpg,png,jpeg,gif,svg,bmp',
            'sku'                 =>      'nullable',
            'section_id'          =>    'nullable',
            'bar_code'            =>      'nullable'
        ];
    }
}

<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\ApiFormRequest;

class AprovedProductRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'product_status_id'   =>    'required',
            'massage'            =>   	'nullable',
        ];
    }
}

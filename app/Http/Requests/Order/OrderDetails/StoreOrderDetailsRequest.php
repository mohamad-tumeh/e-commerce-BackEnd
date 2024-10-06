<?php

namespace App\Http\Requests\Order\OrderDetails;

use App\Http\Requests\ApiFormRequest;

class StoreOrderDetailsRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            "type_product" => 'required|array',
            "type_product.*.product_id" => 'required',
            "type_product.*.type_id" => 'required'
        ];
    }
}

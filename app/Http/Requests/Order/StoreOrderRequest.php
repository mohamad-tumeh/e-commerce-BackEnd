<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\ApiFormRequest;

class StoreOrderRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'date' => 'required|string',
            'location_id' => 'required|integer',
            'promo_id' => 'integer',
            'transaction_key' => 'required'
        ];
    }
}

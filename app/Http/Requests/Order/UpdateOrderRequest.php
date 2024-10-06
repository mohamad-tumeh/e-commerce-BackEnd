<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\ApiFormRequest;

class UpdateOrderRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'date' => 'nullable|string',
            'location_id' => 'nullable|integer',
            'order_status_id' => 'nullable|integer',
            'promo_id' => 'nullable|integer',
        ];
    }
}

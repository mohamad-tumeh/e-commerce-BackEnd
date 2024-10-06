<?php

namespace App\Http\Requests\Order\OrderDetails;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderDetailsRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'product_id' => 'nullable'
        ];
    }
}

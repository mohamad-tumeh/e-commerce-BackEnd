<?php

namespace App\Http\Requests\Store\OpeningTime;

use App\Http\Requests\ApiFormRequest;

class StoreOpeningTimeRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return [
            'day' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
            'state' => 'required|integer',
            'store_id' => 'required|integer',
        ];
    }
}

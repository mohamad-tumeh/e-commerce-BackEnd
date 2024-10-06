<?php

namespace App\Http\Requests\Location;

use App\Http\Requests\ApiFormRequest;

class UpdateLocationRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'street' => 'nullable|string',
            'building_number' => 'nullable|string',
            'floor' => 'nullable|string',
            'is_default' => 'nullable',
            'user_id' => 'nullable|integer',
            'city_id' => 'nullable|integer',
        ];
    }
}

<?php

namespace App\Http\Requests\Location;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends ApiFormRequest
{
    public function rules()
    {

        return [
            'street' => 'required|string',
            'building_number' => 'required|string',
            'floor' => 'required|string',
            'city_id' => 'required|integer',
        ];
    }
}

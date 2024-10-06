<?php

namespace App\Http\Requests\Location;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'postal' => 'required|string',
            'city' => 'required|string',
        ];
    }
}

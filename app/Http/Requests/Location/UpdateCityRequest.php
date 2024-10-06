<?php

namespace App\Http\Requests\Location;

use App\Http\Requests\ApiFormRequest;

class UpdateCityRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return [
            'postal' => 'nullable|string',
            'city' => 'nullable|string',
        ];
    }
}

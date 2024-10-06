<?php

namespace App\Http\Requests\Store\OpeningTime;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOpeningTimeRequest extends ApiFormRequest
{

    public function rules(): array
    {
        return [
            'day' => 'nullable|string',
            'from' => 'nullable|string',
            'to' => 'nullable|string',
            'state' => 'nullable|integer',
            'store_id' => 'nullable|integer',
        ];
    }
}

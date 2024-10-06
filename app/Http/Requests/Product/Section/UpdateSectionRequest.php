<?php

namespace App\Http\Requests\Product\Section;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'section' => 'nullable|string',
            'an_section' => 'nullable|string',

        ];
    }
}

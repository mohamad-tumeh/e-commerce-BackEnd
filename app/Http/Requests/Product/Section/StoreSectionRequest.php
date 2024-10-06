<?php

namespace App\Http\Requests\Product\Section;

use App\Http\Requests\ApiFormRequest;

class StoreSectionRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'section'    => 'required|string',
            'an_section' => 'required|string',
            'store_id'   =>    'nullable'
        ];
    }
}

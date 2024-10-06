<?php

namespace App\Http\Requests\FAQ;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'nullable|string',
            'text'  => 'nullable|string',
            'type'  => 'nullable|integer',
        ];
    }
}

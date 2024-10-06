<?php

namespace App\Http\Requests\FAQ;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'text'  => 'required|string',
            'type'  => 'required|integer',
        ];
    }
}

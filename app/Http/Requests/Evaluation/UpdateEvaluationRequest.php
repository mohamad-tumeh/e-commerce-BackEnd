<?php

namespace App\Http\Requests\Evaluation;

use App\Http\Requests\ApiFormRequest;

class UpdateEvaluationRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'value' => 'nullable',
            'store_id' => 'nullable'
        ];
    }
}

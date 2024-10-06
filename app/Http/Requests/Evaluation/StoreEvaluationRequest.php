<?php

namespace App\Http\Requests\Evaluation;

use App\Http\Requests\ApiFormRequest;

class StoreEvaluationRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'value' => 'required',
            'store_id' => 'required'
        ];
    }
}

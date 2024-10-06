<?php

namespace  App\Http\Requests;

use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class ApiFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $error = (new ValidationException($validator));

        throw new RequestException(collect($error->errors())->values()[0][0],$error->getTrace(),400);
    }
    public function validationData(): array
    {
        return $this->all() ; // $this->route()->parameters
    }
    public abstract function rules();
}

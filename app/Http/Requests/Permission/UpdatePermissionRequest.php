<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\ApiFormRequest;

class UpdatePermissionRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'permission_id' => 'nullable',        ];
    }
}

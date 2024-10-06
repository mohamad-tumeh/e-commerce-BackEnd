<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\ApiFormRequest;

class StorePermissionRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'permission_id' => 'required|array',
        ];
    }
}

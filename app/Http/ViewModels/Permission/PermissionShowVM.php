<?php

namespace App\Http\ViewModels\Permission;

use App\Domain\Permissions\Model\Permission;
use Illuminate\Contracts\Support\Arrayable;

class PermissionShowVM implements Arrayable
{
    private $permission;

    public function __construct($id)
    {
        $this->permission = Permission::find($id);
    }

    public function toArray() {
        return $this->permission;
    }
}

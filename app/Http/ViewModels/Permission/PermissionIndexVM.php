<?php

namespace App\Http\ViewModels\Permission;

use App\Domain\Permissions\Model\Permission;
use Illuminate\Contracts\Support\Arrayable;

class PermissionIndexVM implements Arrayable
{
    private function data()
    {
        return Permission::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

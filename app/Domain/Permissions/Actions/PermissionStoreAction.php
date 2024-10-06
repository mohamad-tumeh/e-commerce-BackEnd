<?php


namespace App\Domain\Permissions\Actions;

use App\Domain\Permissions\DTO\PermissionDTO;
use App\Domain\Permissions\Model\PermissionsPrimerUser;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;

class PermissionStoreAction
{
    public static function execute(PermissionDTO $permissionDTO): PermissionsPrimerUser
    {
        $permission = new PermissionsPrimerUser($permissionDTO->toArray());
        $permission->primer_user_id = PrimerUser::query()->get()->last()->id;
        $permission->save();
        return $permission;
    }
}

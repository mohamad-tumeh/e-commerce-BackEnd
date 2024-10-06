<?php


namespace App\Domain\Permissions\Actions;

use App\Domain\Permissions\DTO\PermissionDTO;
use App\Domain\Permissions\DTO\PermissionUpDTO;
use App\Domain\Permissions\Model\PermissionsPrimerUser;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;

class PermissionStorForMerchanteAction
{
    public static function execute(PermissionDTO $permissionDTO,$id): PermissionsPrimerUser
    {
        $permission = new PermissionsPrimerUser($permissionDTO->toArray());
        PrimerUser::query()->findOrFail($id);
        $permission['primer_user_id'] = $id;
        $permission->save();
        return $permission;
    }
}

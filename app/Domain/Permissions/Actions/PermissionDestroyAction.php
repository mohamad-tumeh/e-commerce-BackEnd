<?php


namespace App\Domain\Permissions\Actions;

use App\Domain\Permissions\Model\PermissionsPrimerUser;

class PermissionDestroyAction
{

    public static function execute($permission_id,$primer_user_id){

        $permission = PermissionsPrimerUser::query()->where('permission_id',$permission_id)->where('primer_user_id',$primer_user_id)->first();
        if($permission)
        $permission->delete();
        return $permission;
    }
}

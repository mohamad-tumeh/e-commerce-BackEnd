<?php


namespace App\Domain\Permissions\Actions;

use App\Domain\Permissions\DTO\PermissionDTO;
use App\Domain\Permissions\DTO\PermissionUpDTO;
use App\Domain\Permissions\Model\PermissionsPrimerUser;
use App\Domain\Sections\DTO\SectionDTO;
use App\Domain\Sections\Model\Section;

class PermissionUpdateAction
{


    public static function execute(PermissionUpDTO $permissionDTO, $permission_id , $primer_user_id){
        $permission = PermissionsPrimerUser::query()->where('permission_id',$permission_id)->where('primer_user_id',$primer_user_id)->first();
        if($permission)
        $permission->update(array_filter($permissionDTO->toArray()));
        return $permission;
    }
}

<?php


namespace App\Domain\Permissions\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class PermissionUpDTO extends DataTransferObject
{

    public $id;
    public $permission_id;
    public $primer_user_id;


    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'permission_id' 		=> $request['permission_id']?? null ,
            'primer_user_id' 		=> $request['primer_user_id'] ?? null ,

        ]);
    }
}

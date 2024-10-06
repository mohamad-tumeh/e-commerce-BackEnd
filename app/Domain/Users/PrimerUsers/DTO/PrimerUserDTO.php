<?php


namespace App\Domain\Users\PrimerUsers\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class PrimerUserDTO extends DataTransferObject
{

    public $first_name;
    public $last_name;
    public $email ;
    public $phone_number ;
    public $password ;
    public $type_id;
    public $store_id;
    public $id;
    public $device_token;

    public static function fromRequest($request): PrimerUserDTO
    {
        return new self([
            'id'=> $request['id'] ?? null ,
            'first_name'=> $request['first_name'] ?? null,
            'last_name'=> $request['last_name'] ?? null,
            'email'=> $request['email'] ?? null,
            'phone_number'=> $request['phone_number'] ?? null,
            'password'=> $request['password'] ?? null,
            'type_id'=> $request['type_id'] ?? null,
            'store_id' => $request['store_id'] ?? null,
            'device_token'   =>  $request['device_token'] ?? null,

        ]);
    }
}

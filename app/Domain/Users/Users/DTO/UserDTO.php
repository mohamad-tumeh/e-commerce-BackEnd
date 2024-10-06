<?php

namespace App\Domain\Users\Users\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public $id;
    public $first_name;
    public $last_name;
    public $email ;
    public $phone_number ;
    public $password ;
    public $remember_token;
    public $gender;
    public $birthday;
    public $e_letter_service;
    public $sms;
    public $api_token;
    public $name;
    public $device_token;
    public $id_socialite;
    public $language_id;
    public $is_block;

    public static function fromRequest($request): UserDTO
    {
        return new self([
            'id'=> $request['id'] ?? null ,
            'first_name'=> $request['first_name'] ?? null ,
            'last_name'=> $request['last_name'] ?? null,
            'email'=> $request['email'] ?? null,
            'phone_number'=> $request['phone_number'] ?? null,
            'password'=> $request['password'] ?? null,
            'remember_token'=> $request['remember_token'] ?? null,
            'gender' => $request['gender'] ?? null,
            'birthday' => $request['birthday'] ?? null,
            'e_letter_service' => $request['e_letter_service'] ?? null,
            'sms' => $request['sms'] ?? null,
            'api_token' =>  $request['token'] ?? null,
            'name' => $request['name'] ?? null,
            'id_socialite' => $request['id_socialite'] ?? null,
            'device_token'   =>  $request['device_token'] ?? null,
            'language_id'   =>  $request['language_id'] ?? null,
            'is_block'      => $request['is_block'] ?? null

        ]);
    }
}

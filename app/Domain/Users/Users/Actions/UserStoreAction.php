<?php

namespace App\Domain\Users\Users\Actions;

use App\Domain\Users\Users\DTO\UserDTO;
use App\Domain\Users\Users\Model\User;
use Illuminate\Support\Facades\Hash;

class UserStoreAction
{
    public static function execute(UserDTO $userDTO): User
    {
        $user = new User($userDTO->toArray());
        if ($userDTO->password != null) {
            $user->password = Hash::make($userDTO->password);
        }

        if ($userDTO->language_id == null) {
            $user->language_id = 1;
        }
        if ($userDTO->name != null) {
            $user->verify = 1;
            $user->is_block = 1;
            $countStrName = strlen($userDTO->name);
            $user->first_name =  strtok($userDTO->name,  ' ');
            $countStrFirstName = strlen($user->first_name);
            $user->last_name =  substr($userDTO->name, $countStrFirstName + 1, $countStrName);
        }
        $user->device_token = $userDTO->device_token;
        $user->save();
        return $user;
    }
}

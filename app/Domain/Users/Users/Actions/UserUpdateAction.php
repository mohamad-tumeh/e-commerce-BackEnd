<?php


namespace App\Domain\Users\Users\Actions;

use App\Domain\Users\Users\DTO\UserDTO;
use App\Domain\Users\Users\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserUpdateAction
{

    public static function execute(UserDTO $userDTO){

        $user = User::where('id',Auth::id())->first();
        if($userDTO->password){
        $userDTO->password = Hash::make($userDTO->password);
        }
        $user->update(array_filter($userDTO->toArray()));
        return $user;
    }
}

<?php


namespace App\Domain\Users\Users\Actions;

use App\Domain\Users\Users\DTO\UserDTO;
use App\Domain\Users\Users\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserBlockedAction
{

    public static function execute(UserDTO $userDTO, $id){

        $user = User::query()->findOrFail($id);
        $user->is_block =  $userDTO->is_block;
        $user->update();
        return $user;
    }
}

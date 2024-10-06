<?php

namespace App\Domain\Users\PrimerUsers\Actions;


use App\Domain\Users\PrimerUsers\DTO\PrimerUserDTO;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Support\Facades\Hash;

class PrimerUserStoreAction
{
    public static function execute(PrimerUserDTO $primerUserDTO): PrimerUser
    {
        $primerUser = new PrimerUser($primerUserDTO->toArray());
        $primerUser->password = Hash::make($primerUserDTO->password);
        $primerUser->device_token = $primerUserDTO->device_token;
        $primerUser->save();
        return $primerUser;
    }
}

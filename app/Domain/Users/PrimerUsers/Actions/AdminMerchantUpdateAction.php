<?php

namespace App\Domain\Users\PrimerUsers\Actions;

use App\Domain\Users\PrimerUsers\DTO\PrimerUserDTO;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminMerchantUpdateAction
{
    public static function execute(PrimerUserDTO $primerUserDTO, $id){

        $primerUser = PrimerUser::where('id',$id)->first();
        $primerUserDTO->password = Hash::make($primerUserDTO->password);
        $primerUser->update(array_filter($primerUserDTO->toArray()));
        return $primerUser;
    }
}

<?php


namespace App\Domain\Users\PrimerUsers\Actions;

use App\Domain\Users\PrimerUsers\Model\PrimerUser;

class AdminDestroyAction
{

    public static function execute($id){

        $admin = PrimerUser::where('id',$id)->first();
        if($admin)
        $admin->delete();
        return $admin;
    }
}

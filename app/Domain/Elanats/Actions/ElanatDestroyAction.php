<?php


namespace App\Domain\Elanats\Actions;

use App\Domain\Elanats\Model\Elanat;
use App\Helpers\Helper;

class ElanatDestroyAction
{

    public static function execute($id){

        $elanat = Elanat::find($id);
        Helper::delete_image($elanat->image);
        $elanat->delete();
        return $elanat;
    }
}

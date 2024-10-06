<?php


namespace App\Domain\OpeningTimes\Actions;

use App\Domain\OpeningTimes\Model\OpeningTimes;

class OpeningTimeDestroyAction
{

    public static function execute($id){

        $openingTime = OpeningTimes::find($id);
        $openingTime->delete();
        return $openingTime;
    }
}

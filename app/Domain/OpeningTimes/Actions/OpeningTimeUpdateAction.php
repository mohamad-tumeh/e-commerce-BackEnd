<?php


namespace App\Domain\OpeningTimes\Actions;


use App\Domain\OpeningTimes\DTO\OpeningTimeDTO;
use App\Domain\OpeningTimes\Model\OpeningTimes;

class OpeningTimeUpdateAction
{


    public static function execute(
        OpeningTimeDTO $openingTimeDTO,
                $id
    ){

        $openingTime = OpeningTimes::find($id);
        if($openingTimeDTO->state == 0){
            $openingTimeDTO->state = 0;
        }
        $openingTime->update(array_filter($openingTimeDTO->toArray()));
        return $openingTime;
    }
}

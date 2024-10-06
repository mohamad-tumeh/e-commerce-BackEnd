<?php


namespace App\Domain\OpeningTimes\Actions;



use App\Domain\OpeningTimes\DTO\OpeningTimeDTO;
use App\Domain\OpeningTimes\Model\OpeningTimes;

class OpeningTimeStoreAction
{
    public static function execute(OpeningTimeDTO $openingTimeDTO): OpeningTimes
    {
        $openingTime = new OpeningTimes($openingTimeDTO->toArray());
        $openingTime->save();
        return $openingTime;
    }
}

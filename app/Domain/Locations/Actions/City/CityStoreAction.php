<?php

namespace App\Domain\Locations\Actions\City;

use App\Domain\Locations\DTO\CityDTO;
use App\Domain\Locations\Model\City;

class CityStoreAction
{
    public static function execute(CityDTO $cityDTO): City
    {
        $city = new City($cityDTO->toArray());
        $city->save();
        return $city;
    }
}

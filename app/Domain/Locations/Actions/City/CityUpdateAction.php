<?php


namespace App\Domain\Locations\Actions\City;

use App\Domain\Locations\DTO\CityDTO;
use App\Domain\Locations\Model\City;

class CityUpdateAction
{


    public static function execute(
        CityDTO $cityDTO,
        $id
    ){

        $city = City::find($id);
        $city->update(array_filter($cityDTO->toArray()));
        return $city;
    }
}

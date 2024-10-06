<?php


namespace App\Domain\Locations\Actions\City;



use App\Domain\Locations\DTO\CityDTO;
use App\Domain\Locations\Model\City;

class CityDestroyAction
{
    public static function execute($id){

        $city = City::find($id);
        $city->delete();
        return $city;
    }
}

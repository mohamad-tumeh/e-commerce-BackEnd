<?php


namespace App\Domain\Locations\Actions;


use App\Domain\Locations\Model\Location;

class LocationDestroyAction
{

    public static function execute($id){

        $location = Location::find($id);
        $location->is_active = 0;
        $location->update();
        return $location;
    }
}

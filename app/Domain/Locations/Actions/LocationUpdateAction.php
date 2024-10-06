<?php


namespace App\Domain\Locations\Actions;

use App\Domain\Locations\DTO\LocationDTO;
use App\Domain\Locations\Model\Location;
use Illuminate\Support\Facades\Auth;

class LocationUpdateAction
{


    public static function execute(
        LocationDTO $locationDTO,
        $id
    ) {

        if ($locationDTO->is_default == 1) {
            $locations = Location::where('user_id', Auth::guard('user')->id()
                ?? Auth::guard('user_socialite')->id())
                ->get();
            foreach ($locations as $loc) {
                $loc->is_default = 0;
                $loc->update();
            }
        }
        $location = Location::find($id);
        $location->update(array_filter($locationDTO->toArray()));
        return $location;
    }
}

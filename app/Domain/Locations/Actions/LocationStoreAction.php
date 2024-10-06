<?php


namespace App\Domain\Locations\Actions;

use App\Domain\Locations\DTO\LocationDTO;
use App\Domain\Locations\Model\Location;
use Illuminate\Support\Facades\Auth;

class LocationStoreAction
{
    public static function execute(LocationDTO $locationDTO): Location
    {
        $locations = Location::where('user_id', Auth::guard('user')->id()
            ?? Auth::guard('user_socialite')->id())
            ->get();
        foreach ($locations as $loc) {
            $loc->is_default = 0;
            $loc->update();
        }
        $location = new Location($locationDTO->toArray());
        $location->is_default = 1;
        $location->user_id = Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id();
        $location->save();
        return $location;
    }
}

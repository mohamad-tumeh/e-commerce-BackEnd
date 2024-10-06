<?php

namespace App\Http\ViewModels\Location;

use App\Domain\Locations\Model\City;
use App\Domain\Locations\Model\Location;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class LocationIndexVM implements Arrayable
{
    private function data(){
        $locations = Location::with('user','city')
        ->where('is_active', 1)
        ->where('user_id',Auth::guard('user')->id()
         ??
         Auth::guard('user_socialite')->id())
         ->orderBy('is_default','desc')
        ->get();

        return $locations;
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

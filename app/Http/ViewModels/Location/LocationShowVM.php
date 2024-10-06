<?php

namespace App\Http\ViewModels\Location;

use App\Domain\Locations\Model\Location;
use Illuminate\Contracts\Support\Arrayable;

class LocationShowVM implements Arrayable
{
    private $location;

    public function __construct($id)
    {
        $this->location = Location::with('user','city')->find($id);
    }

    public function toArray()
    {
        return $this->location;
    }
}

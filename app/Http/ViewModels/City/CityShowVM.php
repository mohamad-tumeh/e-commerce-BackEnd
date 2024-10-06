<?php

namespace App\Http\ViewModels\City;

use App\Domain\Locations\Model\City;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\App;

class CityShowVM implements Arrayable
{
    private $city;

    public function __construct($id)
    {
        $this->city = City::find($id);
    }


    public function toArray()
    {
        return $this->city;
    }
}

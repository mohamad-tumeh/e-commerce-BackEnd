<?php

namespace App\Http\ViewModels\City;

use App\Domain\Locations\Model\City;
use Illuminate\Contracts\Support\Arrayable;

class CityIndexVM implements Arrayable
{
    private function data() {
        return City::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

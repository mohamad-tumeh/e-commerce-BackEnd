<?php

namespace App\Http\ViewModels\Store\OpeningTime;

use App\Domain\OpeningTimes\Model\OpeningTimes;
use Illuminate\Contracts\Support\Arrayable;


class OpeningTimeShowVM implements Arrayable
{
    private $openingTime;

    public function __construct($id)
    {
        $this->openingTime = OpeningTimes::with('store')->find($id);
    }

    public function toArray()
    {
        return $this->openingTime;
    }
}

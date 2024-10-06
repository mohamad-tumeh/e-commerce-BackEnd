<?php

namespace App\Http\ViewModels\Store\OpeningTime;

use App\Domain\OpeningTimes\Model\OpeningTimes;
use Illuminate\Contracts\Support\Arrayable;

class OpeningTimeIndexVM implements Arrayable
{
    private function data()
    {
        return OpeningTimes::with('store')->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

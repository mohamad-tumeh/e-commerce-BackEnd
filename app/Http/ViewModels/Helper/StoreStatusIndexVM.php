<?php

namespace App\Http\ViewModels\Helper;

use App\Domain\Stores\Model\StoresStatus;
use Illuminate\Contracts\Support\Arrayable;

class StoreStatusIndexVM implements Arrayable
{
    private function data(){
        return StoresStatus::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

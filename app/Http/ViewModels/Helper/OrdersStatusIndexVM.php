<?php

namespace App\Http\ViewModels\Helper;

use App\Domain\Orders\Model\OrdersStatus;
use Illuminate\Contracts\Support\Arrayable;


class OrdersStatusIndexVM implements Arrayable
{
    private function data(){
        return OrdersStatus::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

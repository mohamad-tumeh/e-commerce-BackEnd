<?php

namespace App\Http\ViewModels\Helper\statistics;

use App\Domain\Orders\Model\Order;
use App\Domain\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\DB;

class CountOrderVM implements Arrayable
{
    private function data(){
        return Order::select('date AS DateOrder', DB::raw ('COUNT(*) as count'))
        ->groupby('DateOrder')
        ->orderby('date','desc')
        ->get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

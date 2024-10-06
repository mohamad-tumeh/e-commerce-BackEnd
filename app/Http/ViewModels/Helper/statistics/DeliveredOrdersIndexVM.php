<?php

namespace App\Http\ViewModels\Helper\statistics;

use App\Domain\OrderDetails\Model\OrderDetail;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\DB;

class DeliveredOrdersIndexVM implements Arrayable
{
    private function data(){
        return DB::table('order_details')
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->select('orders.date AS DateOrder', DB::raw ('COUNT(*) as count'),'orders.id AS OrderID')
        ->whereOrderStatusId(4)
        ->groupBy('DateOrder','OrderID')
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

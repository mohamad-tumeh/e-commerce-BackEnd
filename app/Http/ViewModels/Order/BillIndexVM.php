<?php

namespace App\Http\ViewModels\Order;

use App\Domain\OrderDetails\Model\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillIndexVM
{
    private function data(){

        return
            OrderDetail::with('user')
               ->whereHas('order' ,function ($q){
                   $q->where('order_status_id','!=',4);
                })
                ->whereHas('order.user' ,function ($q){
                    $q->where('user_id',Auth::guard('user')->id())
                    ->orWhere('user_id',Auth::guard('user_socialite')->id());
                })
                ->leftJoin('orders', 'order_details.order_id', '=', 'orders.id')
                ->select('order_details.*','orders.*','products.*')
                ->select('user_id','order_id','type_price',DB::raw('SUM(price) as totalPrice'))
                ->groupBy('user_id','order_id','type_price')
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

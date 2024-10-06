<?php

namespace App\Http\ViewModels\Order\OrderDetails;

use App\Domain\Orders\Model\Order;
use Illuminate\Support\Facades\Auth;

class MyOrderVM
{

    private function data()
    {
        return Order::with('location.city', 'order_status', 'order_details.product.store.language',
         'order_details.product.section', 'order_details.product.category', 'order_details.type')
            ->where('user_id', Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id())
            ->orderBy('date','desc')
            ->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

<?php

namespace App\Http\ViewModels\Order\OrderDetails;

use App\Domain\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class OrderDetailsShowVM implements Arrayable
{
    private $orderDetails;

    public function __construct($id)
    {
        $this->orderDetails = Order::with('location.city', 'order_status', 'order_details.product.store.language',
         'order_details.product.section', 'order_details.product.category', 'order_details.type','user')
            ->find($id);
    }


    public function toArray()
    {
        return $this->orderDetails;
    }
}

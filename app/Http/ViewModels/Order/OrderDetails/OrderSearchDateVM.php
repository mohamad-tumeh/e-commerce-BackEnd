<?php

namespace App\Http\ViewModels\Order\OrderDetails;

use App\Domain\OrderDetails\Model\OrderDetail;
use App\Domain\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class OrderSearchDateVM implements Arrayable
{
   private $orders;
    public function __construct($date,$order_status_id)
    {
        $this->orders =  Order::with('location.city', 'order_status', 'order_details.product.store.language',
        'order_details.product.section', 'order_details.product.category', 'order_details.type')
        ->where('order_status_id',$order_status_id)
        ->where('date' ,$date)
            ->paginate(25);

            return $this->orders;
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->orders;
    }
}

<?php

namespace App\Http\ViewModels\Order;

use App\Domain\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;

class OrderShowVM implements Arrayable
{
    private $order;

    public function __construct($id)
    {
        $this->order = Order::with('location','order_status')->find($id);
    }

    public function toArray()
    {
        return $this->order;
    }
}

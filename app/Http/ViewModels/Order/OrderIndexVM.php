<?php

namespace App\Http\ViewModels\Order;

use App\Domain\Orders\Model\Order;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class OrderIndexVM implements Arrayable
{
    private function data(){
        return Order::with('location','order_status')->where('id',Auth::guard('user')->id())
            ->orWhere('id',Auth::guard('user_socialite')->id())->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

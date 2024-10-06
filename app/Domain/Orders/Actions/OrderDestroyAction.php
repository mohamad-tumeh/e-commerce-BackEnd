<?php


namespace App\Domain\Orders\Actions;

use App\Domain\Orders\Model\Order;
use App\Domain\Sections\Model\Section;

class OrderDestroyAction
{

    public static function execute($id){

        $order = Order::find($id);
        $order->delete();
        return $order;
    }
}

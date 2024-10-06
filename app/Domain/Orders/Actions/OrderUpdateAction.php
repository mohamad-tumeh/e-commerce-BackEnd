<?php


namespace App\Domain\Orders\Actions;

use App\Domain\Orders\DTO\OrderDTO;
use App\Domain\Orders\Model\Order;

class OrderUpdateAction
{


    public static function execute(
        OrderDTO $orderDTO,
                $id
    ){

        $order = Order::find($id);
        $order->update(array_filter($orderDTO->toArray()));

        return $order;
    }
}

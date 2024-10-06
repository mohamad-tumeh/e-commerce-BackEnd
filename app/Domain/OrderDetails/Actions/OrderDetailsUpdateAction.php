<?php


namespace App\Domain\OrderDetails\Actions;

use App\Domain\OrderDetails\DTO\OrderDetailsDTO;
use App\Domain\OrderDetails\Model\OrderDetail;

class OrderDetailsUpdateAction
{


    public static function execute(
        OrderDetailsDTO $orderDetailsDTO,
        $id,
        $id_order
    ){

        $orderDetails = OrderDetail::where('order_id',$id_order)->find($id);
        $orderDetails->update(array_filter($orderDetailsDTO->toArray()));
        if($orderDetails->order->order_status_id == 4){
            $orderDetails->product->product_status_id = 2;
        }
        return $orderDetails;
    }
}

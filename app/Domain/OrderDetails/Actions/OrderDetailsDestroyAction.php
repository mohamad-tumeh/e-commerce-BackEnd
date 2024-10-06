<?php


namespace App\Domain\OrderDetails\Actions;

use App\Domain\OrderDetails\Model\OrderDetail;

class OrderDetailsDestroyAction
{

    public static function execute($id){

        $orderDetails = OrderDetail::find($id);
        $orderDetails->delete();
        return $orderDetails;
    }
}

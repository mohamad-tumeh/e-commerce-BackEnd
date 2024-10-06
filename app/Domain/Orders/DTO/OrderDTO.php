<?php


namespace App\Domain\Orders\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class OrderDTO extends DataTransferObject
{

    public $id;
    public $date;
    public $location_id;
    public $order_status_id;
    public $promo_id;
    public $transaction_key;


    public static function fromRequest($request)
    {
        return new self([
            'id'                     =>  $request['id'] ?? null,
            'date' 	               	 =>  $request['date'] ?? null ,
            'location_id' 		     =>  $request['location_id'] ?? null ,
            'order_status_id'        =>  $request['order_status_id'] ?? null,
            'promo_id' 		         =>  $request['promo_id'] ?? null ,
            'transaction_key'        =>  $request['transaction_key'] ?? null

        ]);
    }
}

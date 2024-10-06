<?php


namespace App\Domain\OrderDetails\DTO;

use PhpParser\Node\Expr\Cast\Object_;
use Spatie\DataTransferObject\DataTransferObject;


class OrderDetailsDTO extends DataTransferObject
{

    public $id;
    public $price;
    public $product_id;
    public $order_id;
    public $type_id;
    public $type_price;

    public static function fromRequest($request,$i)
    { 
        
        return new self([
            'id'            =>  $request['id'] ?? null,
            'product_id'  => $request['type_product'][$i]['product_id'] ?? null ,
            'type_id' 	=>$request['type_product'][$i]['type_id'] ?? null ,
        ]);
    }
}

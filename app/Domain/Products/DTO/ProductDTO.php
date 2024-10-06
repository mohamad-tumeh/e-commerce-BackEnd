<?php


namespace App\Domain\Products\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductDTO extends DataTransferObject
{

    public $id;
    public $name;
    public $an_name;
    public $image;
    public $sku;
    public $bar_code;
    public $description;
    public $an_description;
    public $price;
    public $massage;
    public $is_active;
    public $section_id;
    public $product_status_id;
    public $store_id;


    public static function fromRequest($request): ProductDTO
    {
        return new self([
            'id'                    => $request['id'] ?? null,
            'description'           => $request['description'] ?? null ,
            'an_description'        => $request['an_description'] ?? null ,
            'name' 	                => $request['name'] ?? null ,
            'an_name' 	            => $request['an_name'] ?? null ,
            'price'                 => $request['price_product'] ?? null,
            'image' 	            => $request['image'] ?? null ,
            'sku'               	=> $request['sku'] ?? null ,
            'massage'               => $request['massage'] ?? null ,
            'is_active'             => $request['is_active'] ?? null ,
            'section_id'            => $request['section_id'] ?? null,
            'bar_code'          	=> $request['bar_code'] ?? null ,
            'product_status_id'     => $request['product_status_id'] ?? null,
            'store_id'           	=> $request['store_id'] ?? null ,

        ]);
    }
}

<?php


namespace App\Domain\Sections\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class SectionDTO extends DataTransferObject
{

    public $id;
    public $section;
    public $massage;
    public $an_section;
    public $is_active;
    public $product_status_id;
    public $store_id;


    public static function fromRequest($request)
    {
        return new self([
            'id'                    => $request['id'] ?? null,
            'section' 		        => $request['section'] ?? null ,
            'an_section'        	=> $request['an_section'] ?? null ,
            'massage' 		        => $request['massage'] ?? null ,
            'is_active'             => $request['is_active'] ?? null ,
            'product_status_id'     => $request['product_status_id'] ?? null ,
            'store_id'            => $request['store_id'] ?? null ,

        ]);
    }
}

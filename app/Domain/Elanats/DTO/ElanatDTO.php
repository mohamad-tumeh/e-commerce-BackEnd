<?php


namespace App\Domain\Elanats\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ElanatDTO extends DataTransferObject
{

    public $id;
    public $image;
    public $date;
    public $store_id;

    public static function fromRequest($request)
    {
        return new self([
            'id'                    => $request['id'] ?? null,
            'image' 		        => $request['image'] ?? null ,
            'date'              	=> $request['date'] ?? null ,
            'store_id' 		        => $request['store_id'] ?? null ,
        ]);
    }
}

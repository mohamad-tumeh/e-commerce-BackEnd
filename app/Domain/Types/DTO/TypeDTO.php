<?php


namespace App\Domain\Types\DTO;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class TypeDTO extends DataTransferObject
{
    public $id;
    public $type;
    public $an_type;
    public $price;
    public $category_id;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest($request,$i): TypeDTO
    {

            return new self([
                'id' => $request['id'] ?? null,
                'type' => $request['type'][$i] ?? null,
                'an_type' => $request['an_type'][$i] ?? null,
                'price' => $request['price'][$i]  ?? null,
                'category_id' => $request['category_id'] ?? null,
            ]);
        }

}

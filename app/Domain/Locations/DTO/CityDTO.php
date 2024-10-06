<?php


namespace App\Domain\Locations\DTO;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class CityDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $postal;
	/* @var integer|null */
public $city;


    /**
     * @throws UnknownProperties
     */
    public static function fromRequest($request): CityDTO
    {
        return new self([
            'id'     =>  $request['id'] ?? null,
            'postal' => $request['postal'] ?? null ,
			'city'   => $request['city'] ?? null ,

        ]);
    }

}

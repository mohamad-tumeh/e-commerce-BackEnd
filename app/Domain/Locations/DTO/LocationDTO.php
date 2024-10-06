<?php


namespace App\Domain\Locations\DTO;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class LocationDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
    public $street;
	/* @var integer|null */
    public $building_number;
	/* @var string|null */
    public $floor;
	/* @var string|null */
    public $is_default;
    /* @var string|null */
    public $city_id;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest($request): LocationDTO
    {
        return new self([
            'id'          =>  $request['id'] ?? null,
            'street' => $request['street'] ?? null ,
			'building_number' => $request['building_number'] ?? null ,
			'floor' 		  => $request['floor'] ?? null ,
			'is_default' => $request['is_default'] ?? null ,
			'city_id' 	  => $request['city_id'] ?? null ,

        ]);
    }
}

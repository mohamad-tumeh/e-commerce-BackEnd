<?php


namespace App\Domain\OpeningTimes\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class OpeningTimeDTO extends DataTransferObject
{

    public $id;
    public $day;
    public $from;
    public $to;
    public $state;
    public $store_id;


    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'day' 					=> $request['day'] ?? null ,
			'from' 					=> $request['from'] ?? null ,
			'to' 					=> $request['to'] ?? null ,
			'state' 					=> $request['state'] ?? null ,
			'store_id' 					=> $request['store_id'] ?? null ,

        ]);
    }
}

<?php


namespace App\Domain\Evaluations\DTO;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class EvaluationDTO extends DataTransferObject
{
    public $id;
    public $value;
    public $store_id;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest($request): EvaluationDTO
    {
        return new self([
            'id'          =>  $request['id'] ?? null,
            'value' => $request['value'] ?? null ,
			'store_id' => $request['store_id'] ?? null
        ]);
    }
}

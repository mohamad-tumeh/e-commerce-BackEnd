<?php


namespace App\Domain\Categories\DTO;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class CategoryDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var String|null */
    public $category;
    public $an_category;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest($request): CategoryDTO
    {
        return new self([
            'id'          =>  $request['id'] ?? null,
            'category' => $request['category'] ?? null ,
            'an_category' => $request['an_category'] ?? null ,

        ]);
    }
}

<?php


namespace App\Domain\Faqs\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class FaqDTO extends DataTransferObject
{

    public $id;
    public $title;
    public $text;
    public $type;

    public static function fromRequest($request)
    {
        return new self([
            'id'    => $request['id'] ?? null,
            'title' => $request['title'] ?? null ,
            'text'  => $request['text'] ?? null ,
            'type'  => $request['type'] ?? null ,
        ]);
    }
}

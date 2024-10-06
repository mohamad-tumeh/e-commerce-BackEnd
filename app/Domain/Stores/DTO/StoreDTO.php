<?php


namespace App\Domain\Stores\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class StoreDTO extends DataTransferObject
{
    public $id;
	public $name;
	public $an_name;
	public $post_code;
    public $image;
    public $cover;
    public $phone_number;
    public $bank_account_number;
    public $store_status_id;
    public $city_id;

    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'name'        =>  $request['name'] ?? null,
            'an_name'        =>  $request['an_name'] ?? null,
            'post_code'        =>  $request['post_code'] ?? null,
            'image'        =>  $request['image'] ?? null,
            'cover'        =>  $request['cover'] ?? null,
            'phone_number'        =>  $request['phone_number'] ?? null,
            'bank_account_number'        =>  $request['bank_account_number'] ?? null,
            'store_status_id'        =>  $request['store_status_id'] ?? null,
            'city_id'        =>  $request['city_id'] ?? null,
        ]);

    }
}

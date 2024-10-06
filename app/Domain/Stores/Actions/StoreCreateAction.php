<?php


namespace App\Domain\Stores\Actions;



use App\Domain\Stores\DTO\StoreDTO;
use App\Domain\Stores\Model\Store;
use App\Helpers\Helper;

class StoreCreateAction
{
    public static function execute(StoreDTO $storeDTO): Store
    {
        $store = new Store($storeDTO->toArray());
        $image = Helper::upload_image($storeDTO->image,'Images/Stores/images/');
        $cover = Helper::upload_image($storeDTO->cover,'Images/Stores/covers/');
        $store->image = $image;
        $store->cover = $cover;
        $store->store_status_id = 1;
        $store->save();
        return $store;
    }
}

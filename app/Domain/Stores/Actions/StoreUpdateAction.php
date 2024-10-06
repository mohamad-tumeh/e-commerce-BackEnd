<?php


namespace App\Domain\Stores\Actions;

use App\Domain\Stores\DTO\StoreDTO;
use App\Domain\Stores\Model\Store;
use App\Helpers\Helper;

class StoreUpdateAction
{


    public static function execute(StoreDTO $storeDTO,$id): Store {

        $store = Store::find($id);
        if($storeDTO->image != null) {
            Helper::delete_image($store->image);
            $image = Helper::upload_image($storeDTO->image, 'Images/Stores/images/');
            $storeDTO->image = $image;
        }
        if($storeDTO->cover != null) {
            Helper::delete_image($store->cover);
            $cover = Helper::upload_image($storeDTO->cover, 'Images/Stores/covers/');
            $storeDTO->cover = $cover;
        }
           $store->update(array_filter($storeDTO->toArray()));
        return $store;
    }
}

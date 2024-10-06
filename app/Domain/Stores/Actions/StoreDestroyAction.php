<?php


namespace App\Domain\Stores\Actions;


use App\Domain\Stores\Model\Store;
use App\Helpers\Helper;

class StoreDestroyAction
{
    public static function execute($id){

        $store = Store::find($id);
        Helper::delete_image($store->image);
        Helper::delete_image($store->cover);
        $store->delete();
        return $store;
    }
}

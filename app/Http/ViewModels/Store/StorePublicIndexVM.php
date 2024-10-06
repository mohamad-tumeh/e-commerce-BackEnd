<?php

namespace App\Http\ViewModels\Store;

use App\Domain\Stores\Model\Store;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class StorePublicIndexVM implements Arrayable
{
    private $stores;

    public function __construct($language_id)
    {
        if($language_id == 1)
         $this->stores = Store::with('store_status','opening_time','tag','language','city')
            ->orderBy('language_id')->paginate(25);
            else if($language_id == 2)
            $this->stores = Store::with('store_status','opening_time','tag','language','city')
            ->orderBy('language_id' ,'desc')->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->stores;
    }
}

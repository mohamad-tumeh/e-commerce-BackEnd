<?php

namespace App\Http\ViewModels\Store;

use App\Domain\Stores\Model\Store;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class StoreShowVM implements Arrayable
{
    private $store;

    public function __construct($id)
    {
        return $this->store = Store::with('store_status', 'opening_time', 'tag', 'language', 'city')
            ->orderBy('language_id')
            ->find($id);
    }

    public function toArray()
    {
        return $this->store;
    }
}

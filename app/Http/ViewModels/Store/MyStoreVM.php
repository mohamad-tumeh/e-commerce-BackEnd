<?php

namespace App\Http\ViewModels\Store;

use App\Domain\Stores\Model\Store;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class MyStoreVM implements Arrayable
{
    private function data()
    {
        return  PrimerUser::with('store.store_status','store.tag','store.city')
            ->where('type','merchant')
            ->where('id',Auth::guard('primer_user')->id())
            ->get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

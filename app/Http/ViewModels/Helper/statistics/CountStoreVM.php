<?php

namespace App\Http\ViewModels\Helper\statistics;

use App\Domain\Stores\Model\Store;
use App\Domain\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\DB;

class CountStoreVM implements Arrayable
{
    private function data(){
        return Store::
        select('language_id', DB::raw ('COUNT(*) as count'))
        ->groupby('language_id')
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

<?php

namespace App\Http\ViewModels\Store;

use App\Domain\Stores\Model\Store;
use Illuminate\Contracts\Support\Arrayable;

class StoresIndexVM implements Arrayable
{
    private function data()
    {
            return Store::with('primer_user','store_status','opening_time','tag','language','city')
            ->orderBy('language_id')
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

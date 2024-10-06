<?php

namespace App\Http\ViewModels\Elanat;

use App\Domain\Elanats\Model\Elanat;
use Illuminate\Contracts\Support\Arrayable;

class ElanatIndexVM implements Arrayable
{
    private function data(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Elanat::with('store.store_status','store.opening_time','store.tag','store.language','store.city')->get();
    }
    /**
     * @inheritDoc
     */
    public function toArray(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->data();
    }
}

<?php

namespace App\Http\ViewModels\Elanat;

use App\Domain\Elanats\Model\Elanat;
use Illuminate\Contracts\Support\Arrayable;

class ElanatShowVM implements Arrayable
{
    private $elanat;

    public function __construct($id)
    {
        $this->elanat = Elanat::with('store.store_status','store.opening_time','store.tag','store.language','store.city')->find($id);
    }


    public function toArray()
    {
        return $this->elanat;
    }
}

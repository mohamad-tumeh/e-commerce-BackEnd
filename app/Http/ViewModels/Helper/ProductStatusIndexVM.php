<?php

namespace App\Http\ViewModels\Helper;

use App\Domain\Products\Model\ProductStatus;
use Illuminate\Contracts\Support\Arrayable;


class ProductStatusIndexVM implements Arrayable
{
    private function data(){
        return ProductStatus::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

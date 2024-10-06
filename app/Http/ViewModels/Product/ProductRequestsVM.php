<?php

namespace App\Http\ViewModels\Product;

use App\Domain\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;


class ProductRequestsVM implements Arrayable
{
    private function data(){
        return Product::with('section','product_status','store','category.type')
            ->where('product_status_id',3)
            ->where('is_active',1)
            ->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

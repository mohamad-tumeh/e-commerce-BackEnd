<?php

namespace App\Http\ViewModels\Product;

use App\Domain\Products\Model\Product;
use App\Domain\Stores\Model\Store;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class ProductShowVM implements Arrayable
{
    private $product;

    public function __construct($store_id, $id)
    {
        $this->product = Product::with(['section', 'store', 'category', 'category.type', 'product_status'])
            ->where('store_id', $store_id)
            ->find($id);
    }

    public function toArray()
    {
        return $this->product;
    }
}

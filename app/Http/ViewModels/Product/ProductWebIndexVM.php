<?php

namespace App\Http\ViewModels\Product;

use App\Domain\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;


class ProductWebIndexVM implements Arrayable
{
    private $products;
    public function __construct($store_id,$section_id)
    {
        $this->products =  Product::where('store_id',$store_id)
            ->where('section_id',$section_id)
            ->with('section','product_status','store.language','category.type')
         ->where('product_status_id', 1)
         ->where('is_active',1)
         ->get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->products;
    }
}

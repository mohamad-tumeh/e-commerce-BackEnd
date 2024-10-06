<?php

namespace App\Http\ViewModels\Product;

use App\Domain\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class FilterBySectionANDStatusProductVM implements Arrayable
{
    private $products;

    public function __construct($section_id,$status_id){
         $this->products = Product::with('section','product_status','store','category.type')
         ->where('section_id',$section_id)
         ->where('product_status_id',$status_id)
            ->whereHas('store.primer_user',function($q){
                $q->where('id',Auth::guard('primer_user')->id());
            })
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

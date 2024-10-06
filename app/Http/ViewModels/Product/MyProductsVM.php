<?php

namespace App\Http\ViewModels\Product;

use App\Domain\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class MyProductsVM implements Arrayable
{
    private function data(){
        return Product::with('section','product_status','store','category.type')
            ->whereHas('store.primer_user',function($q){
                $q->where('id',Auth::guard('primer_user')->id());
            })
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

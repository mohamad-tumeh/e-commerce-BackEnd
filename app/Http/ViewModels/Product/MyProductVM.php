<?php

namespace App\Http\ViewModels\Product;

use App\Domain\Products\Model\Product;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class MyProductVM implements Arrayable
{
    private $product;

    public function __construct($id)
    {

        $this->product = Product::with('section', 'product_status', 'store', 'category.type')
            ->whereHas('store.primer_user', function ($q) {
                $q->where('id', Auth::guard('primer_user')->id());
            })
            ->find($id);
    }

    public function toArray()
    {
        return $this->product;
    }
}

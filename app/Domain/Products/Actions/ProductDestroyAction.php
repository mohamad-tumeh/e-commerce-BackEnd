<?php


namespace App\Domain\Products\Actions;


use App\Domain\Products\Model\Product;

class ProductDestroyAction
{

    public static function execute($id){

        $product = Product::find($id);
        $product->is_active = 0;
        $product->update();
        return $product;
    }
}

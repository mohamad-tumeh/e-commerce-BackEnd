<?php


namespace App\Domain\Products\Actions;

use App\Domain\Products\DTO\ProductDTO;
use App\Domain\Products\Model\Product;
use App\Helpers\Helper;

class ProductAprovedeAction
{


    public static function execute(
        ProductDTO $productDTO,
                $id
    ){

        $product = Product::find($id);

        if($productDTO->product_status_id == 1){
            $product->massage = null;
        }
        $product->update(array_filter($productDTO->toArray()));

        return $product;
    }
}

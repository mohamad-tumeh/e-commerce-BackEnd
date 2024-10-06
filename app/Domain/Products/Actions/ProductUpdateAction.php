<?php


namespace App\Domain\Products\Actions;

use App\Domain\Products\DTO\ProductDTO;
use App\Domain\Products\Model\Product;
use App\Helpers\Helper;

class ProductUpdateAction
{


    public static function execute(
        ProductDTO $productDTO,
                $id
    ){

        $product = Product::find($id);

        if($productDTO->image != null) {
            $image = Helper::upload_image($productDTO->image, 'Images/Products/images/');
            $productDTO->image = $image;
        }
        $product->product_status_id = 3;
        $product->update(array_filter($productDTO->toArray()));

        return $product;
    }
}

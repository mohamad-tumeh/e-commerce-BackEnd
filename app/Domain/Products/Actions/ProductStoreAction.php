<?php


namespace App\Domain\Products\Actions;

use App\Domain\Categories\Model\Category;
use App\Domain\Products\DTO\ProductDTO;
use App\Domain\Products\Model\Product;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;

class ProductStoreAction
{
    public static function execute(ProductDTO $productDTO ,$category_id): Product
    {
        $product = new Product($productDTO->toArray());
        $image =  Helper::upload_image($productDTO->image,'Images/Products/images/');
        $product->image = $image;
        $product->category_id = $category_id;
        $product->is_active  = 1;
        $product->product_status_id = 3;
        $product->store_id = Auth::guard('primer_user')->user()->store_id;
        $product->save();
        return $product;
    }
}

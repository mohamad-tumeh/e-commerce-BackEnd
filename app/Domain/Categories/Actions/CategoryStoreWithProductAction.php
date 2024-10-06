<?php


namespace App\Domain\Categories\Actions;

use App\Domain\Categories\DTO\CategoryDTO;
use App\Domain\Categories\Model\Category;
use App\Domain\Products\Model\Product;

class CategoryStoreWithProductAction
{
    public static function execute(CategoryDTO $categoryDTO, $product_id): Category
    {
        $category = new Category($categoryDTO->toArray());
        $category->save();
        $product = Product::find($product_id);
        $product['category_id'] = $category->id;
        $product->update();
        return $category;
    }
}

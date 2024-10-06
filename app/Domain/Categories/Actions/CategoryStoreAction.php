<?php


namespace App\Domain\Categories\Actions;

use App\Domain\Categories\DTO\CategoryDTO;
use App\Domain\Categories\Model\Category;
use App\Domain\Products\Model\Product;

class CategoryStoreAction
{
    public static function execute(CategoryDTO $categoryDTO): Category
    {
        $category = new Category($categoryDTO->toArray());
        $category->save();
        return $category;
    }
}

<?php


namespace App\Domain\Categories\Actions;


use App\Domain\Categories\DTO\CategoryDTO;
use App\Domain\Categories\Model\Category;

class CategoryUpdateAction
{


    public static function execute(
        CategoryDTO $categoryDTO,
                $id
    ){

        $category = Category::find($id);
        $category->update(array_filter($categoryDTO->toArray()));
        return $category;
    }
}

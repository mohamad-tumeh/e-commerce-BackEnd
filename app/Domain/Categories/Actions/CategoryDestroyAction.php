<?php


namespace App\Domain\Categories\Actions;

use App\Domain\Categories\Model\Category;

class CategoryDestroyAction
{

    public static function execute($id){

        $category = Category::find($id);
        $category->delete();
        return $category;
    }
}

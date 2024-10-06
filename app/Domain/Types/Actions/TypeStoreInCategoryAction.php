<?php


namespace App\Domain\Types\Actions;

use App\Domain\Categories\Model\Category;
use App\Domain\Types\DTO\TypeDTO;
use App\Domain\Types\Model\Type;

class TypeStoreInCategoryAction
{
    public static function execute(TypeDTO $typeDTO,$category_id): Type
    {
        $type = new Type($typeDTO->toArray());

        $type->category_id = Category::query()->findOrFail($category_id)->id;
        $type->save();
        return $type;
    }
}

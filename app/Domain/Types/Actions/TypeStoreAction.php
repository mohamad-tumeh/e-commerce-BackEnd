<?php


namespace App\Domain\Types\Actions;

use App\Domain\Categories\Model\Category;
use App\Domain\Types\DTO\TypeDTO;
use App\Domain\Types\Model\Type;

class TypeStoreAction
{
    public static function execute(TypeDTO $typeDTO): Type
    {
        $type = new Type($typeDTO->toArray());
        $type->category_id = Category::query()
            ->get()->last()->id;
        $type->save();
        return $type;
    }
}

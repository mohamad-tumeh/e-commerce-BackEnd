<?php


namespace App\Domain\Types\Actions;

use App\Domain\Types\DTO\TypeDTO;
use App\Domain\Types\Model\Type;

class TypeUpdateAction
{


    public static function execute(
        TypeDTO $typeDTO,
                $id
    ){

        $type = Type::find($id);
        $type->update(array_filter($typeDTO->toArray()));
        return $type;
    }
}

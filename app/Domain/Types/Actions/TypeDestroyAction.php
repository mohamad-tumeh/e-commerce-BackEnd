<?php


namespace App\Domain\Types\Actions;

use App\Domain\Types\Model\Type;

class TypeDestroyAction
{

    public static function execute($id){

        $type = Type::find($id);
        $type->delete();
        return $type;
    }
}

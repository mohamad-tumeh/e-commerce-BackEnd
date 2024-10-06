<?php

namespace App\Http\ViewModels\Product\Type;

use App\Domain\Types\Model\Type;
use Illuminate\Contracts\Support\Arrayable;


class TypeIndexVM implements Arrayable
{
    private function data(){
        $types = Type::with('category')->paginate(25);
        return $types;
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

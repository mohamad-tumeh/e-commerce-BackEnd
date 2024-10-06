<?php

namespace App\Http\ViewModels\Product\Type;

use App\Domain\Sections\Model\Section;
use App\Domain\Types\Model\Type;
use Illuminate\Contracts\Support\Arrayable;

class TypeShowVM implements Arrayable
{
    private $type;

    public function __construct($id)
    {
        $this->type = Type::with('category')->find($id);
    }

    public function toArray()
    {
        return $this->type;
    }
}

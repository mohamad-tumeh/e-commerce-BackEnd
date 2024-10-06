<?php

namespace App\Http\ViewModels\Product\Category;

use App\Domain\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class CategoryShowVM implements Arrayable
{
    private $category;

    public function __construct($id)
    {
        $this->category = Category::with('type')->find($id);
    }

    public function toArray()
    {
        return $this->category;
    }
}

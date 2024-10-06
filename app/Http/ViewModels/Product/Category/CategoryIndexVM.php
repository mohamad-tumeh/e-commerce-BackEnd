<?php

namespace App\Http\ViewModels\Product\Category;


use App\Domain\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class CategoryIndexVM implements Arrayable
{
    private function data(){
        $categorys = Category::with('type')->paginate(25);
        return $categorys;
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

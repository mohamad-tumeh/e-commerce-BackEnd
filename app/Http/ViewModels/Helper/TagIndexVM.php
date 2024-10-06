<?php

namespace App\Http\ViewModels\Helper;

use App\Domain\Stores\Model\Tag;

class TagIndexVM
{
    private function data(){
        return Tag::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

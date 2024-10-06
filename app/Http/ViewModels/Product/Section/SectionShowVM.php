<?php

namespace App\Http\ViewModels\Product\Section;

use App\Domain\Sections\Model\Section;
use Illuminate\Contracts\Support\Arrayable;

class SectionShowVM implements Arrayable
{
    private $section;

    public function __construct($store_id,$id)
    {
        $this->section = Section::where('store_id',$store_id)
        ->find($id);
    }

    public function toArray()
    {
        return $this->section;
    }
}

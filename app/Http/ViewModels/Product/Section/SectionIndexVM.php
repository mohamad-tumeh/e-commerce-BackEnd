<?php

namespace App\Http\ViewModels\Product\Section;


use App\Domain\Sections\Model\Section;
use Illuminate\Contracts\Support\Arrayable;

class SectionIndexVM implements Arrayable
{
    private $sections;
    public function __construct($store_id)
    {
        $this->sections =Section::where('product_status_id',1)
        ->where('is_active',1)
        ->where('store_id',$store_id)
        ->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->sections;
    }
}

<?php

namespace App\Http\ViewModels\Product\Section;

use App\Domain\Products\Model\Product;
use App\Domain\Sections\Model\Section;
use App\Domain\Types\Model\Type;
use Illuminate\Contracts\Support\Arrayable;


class SectionRequestsVM implements Arrayable
{
    private function data(){
        return Section::where('product_status_id',3)->where('is_active',1)->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

<?php

namespace App\Http\ViewModels\Product\Section;

use App\Domain\Sections\Model\Section;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class MySectionsVM implements Arrayable
{
    private function data(){
    return Section::where('store_id',Auth::guard('primer_user')->user()['store_id'])
        ->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

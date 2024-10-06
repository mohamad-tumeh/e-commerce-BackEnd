<?php

namespace App\Http\ViewModels\Helper;

use App\Domain\Language\Model\Language;
use Illuminate\Contracts\Support\Arrayable;

class LanguageIndexVM implements Arrayable
{
    private function data(){
        return Language::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

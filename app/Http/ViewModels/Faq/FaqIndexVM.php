<?php

namespace App\Http\ViewModels\Faq;

use App\Domain\Faqs\Model\Faq;
use Illuminate\Contracts\Support\Arrayable;

class FaqIndexVM implements Arrayable
{
    private function data() {
        return Faq::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

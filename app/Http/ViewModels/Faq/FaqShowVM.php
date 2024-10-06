<?php

namespace App\Http\ViewModels\Faq;

use App\Domain\Faqs\Model\Faq;
use Illuminate\Contracts\Support\Arrayable;

class FaqShowVM implements Arrayable
{
    private $faq;

    public function __construct($id)
    {
        $this->faq = Faq::find($id);
    }


    public function toArray()
    {
        return $this->faq;
    }
}

<?php


namespace App\Domain\Faqs\Actions;

use App\Domain\Faqs\Model\Faq;

class FaqDestroyAction
{

    public static function execute($id){

        $faq = Faq::find($id);
        $faq->delete();
        return $faq;
    }
}

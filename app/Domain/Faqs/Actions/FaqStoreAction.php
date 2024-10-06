<?php


namespace App\Domain\Faqs\Actions;

use App\Domain\Faqs\Model\Faq;
use App\Domain\Faqs\DTO\FaqDTO;

class FaqStoreAction
{
    public static function execute(FaqDTO $faqDTO): Faq
    {
        $faq = new Faq($faqDTO->toArray());
        $faq->save();
        return $faq;
    }
}

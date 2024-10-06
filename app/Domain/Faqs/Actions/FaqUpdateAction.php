<?php


namespace App\Domain\Faqs\Actions;

use App\Domain\Faqs\DTO\FaqDTO;
use App\Domain\Faqs\Model\Faq;

class FaqUpdateAction
{
    public static function execute(FaqDTO $faqDTO, $id)
    {
        $faq = Faq::find($id);
        $faq->update(array_filter($faqDTO->toArray()));
        return $faq;
    }
}

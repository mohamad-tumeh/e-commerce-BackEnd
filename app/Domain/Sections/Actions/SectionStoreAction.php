<?php


namespace App\Domain\Sections\Actions;

use App\Domain\Sections\DTO\SectionDTO;
use App\Domain\Sections\Model\Section;
use Illuminate\Support\Facades\Auth;

class SectionStoreAction
{
    public static function execute(SectionDTO $sectionDTO): Section
    {
        $section = new Section($sectionDTO->toArray());
        $section->is_active = 1;
        $section->store_id = Auth::guard('primer_user')->user()->store->id;
        $section->product_status_id = 3;
        $section->save();
        return $section;
    }
}

<?php


namespace App\Domain\Sections\Actions;

use App\Domain\Sections\DTO\SectionDTO;
use App\Domain\Sections\Model\Section;

class SectionUpdateAction
{


    public static function execute(
        SectionDTO $sectionDTO,
                $id
    ){

        $section = Section::find($id);
        $section->product_status_id = 3;
        $section->update(array_filter($sectionDTO->toArray()));
        return $section;
    }
}

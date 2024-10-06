<?php


namespace App\Domain\Sections\Actions;

use App\Domain\Sections\DTO\SectionDTO;
use App\Domain\Sections\Model\Section;

class SectionAprovedAction
{


    public static function execute(
        SectionDTO $sectionDTO,
                $id
    ){

        $section = Section::find($id);
        if($sectionDTO->product_status_id == 1){
            $section->massage = null;
        }
        $section->update(array_filter($sectionDTO->toArray()));

        return $section;
    }
}

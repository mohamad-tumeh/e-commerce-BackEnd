<?php


namespace App\Domain\Sections\Actions;

use App\Domain\Sections\Model\Section;

class SectionDestroyAction
{

    public static function execute($id){

        $section = Section::find($id);
        $section->is_active = 0;
        $section->update();
        return $section;
    }
}

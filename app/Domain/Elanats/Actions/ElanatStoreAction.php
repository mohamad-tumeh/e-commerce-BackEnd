<?php


namespace App\Domain\Elanats\Actions;

use App\Domain\Elanats\Model\Elanat;
use App\Domain\Elanats\DTO\ElanatDTO;
use App\Helpers\Helper;

class ElanatStoreAction
{
    public static function execute(ElanatDTO $elanatDTO): Elanat
    {
        $elanat = new Elanat($elanatDTO->toArray());
        $image = Helper::upload_image($elanatDTO->image,'Images/Elanats/images/');
        $elanat->image = $image;
        $elanat->save();
        return $elanat;
    }
}

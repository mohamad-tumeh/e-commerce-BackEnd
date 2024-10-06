<?php


namespace App\Domain\Elanats\Actions;

use App\Domain\Elanats\DTO\ElanatDTO;
use App\Domain\Elanats\Model\Elanat;
use App\Helpers\Helper;

class ElanatUpdateAction
{
    public static function execute(
        ElanatDTO $elanatDTO,
                $id
    ){
        $elanat = Elanat::find($id);
        if($elanatDTO->image != null) {
            Helper::delete_image($elanat->image);
            $image = Helper::upload_image($elanatDTO->image, 'Images/Elanats/images/');
            $elanatDTO->image = $image;
        }
        $elanat->update(array_filter($elanatDTO->toArray()));
        return $elanat;
    }
}

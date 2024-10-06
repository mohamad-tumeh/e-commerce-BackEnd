<?php


namespace App\Domain\Evaluations\Actions;


use App\Domain\Evaluations\Model\Evaluation;
use App\Domain\Locations\Model\Location;

class EvaluationDestroyAction
{

    public static function execute($id){

        $evaluation = Evaluation::find($id);
        $evaluation->delete();
        return $evaluation;
    }
}

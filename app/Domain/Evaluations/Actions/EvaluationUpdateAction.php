<?php


namespace App\Domain\Evaluations\Actions;

use App\Domain\Evaluations\DTO\EvaluationDTO;
use App\Domain\Evaluations\Model\Evaluation;

class EvaluationUpdateAction
{


    public static function execute(
        EvaluationDTO $evaluationDTO,
                $id
    ){

        $evaluation = Evaluation::find($id);
        $evaluation->update(array_filter($evaluationDTO->toArray()));
        return $evaluation;
    }
}

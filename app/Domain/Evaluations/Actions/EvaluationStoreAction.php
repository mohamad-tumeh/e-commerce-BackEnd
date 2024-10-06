<?php


namespace App\Domain\Evaluations\Actions;

use App\Domain\Evaluations\DTO\EvaluationDTO;
use App\Domain\Evaluations\Model\Evaluation;
use App\Domain\Locations\DTO\LocationDTO;
use App\Domain\Locations\Model\Location;
use Illuminate\Support\Facades\Auth;

class EvaluationStoreAction
{
    public static function execute(EvaluationDTO $evaluationDTO): Evaluation
    {
        $evaluation = new Evaluation($evaluationDTO->toArray());
        $evaluation->user_id = Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id();
        $evaluation->save();
        return $evaluation;
    }
}

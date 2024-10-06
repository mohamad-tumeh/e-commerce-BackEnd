<?php

namespace App\Http\Controllers\Evaluation;

use App\Domain\Evaluations\Actions\EvaluationDestroyAction;
use App\Domain\Evaluations\Actions\EvaluationStoreAction;
use App\Domain\Evaluations\Actions\EvaluationUpdateAction;
use App\Domain\Evaluations\DTO\EvaluationDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Evaluation\StoreEvaluationRequest;
use App\Http\Requests\Evaluation\UpdateEvaluationRequest;
use App\Http\ViewModels\Evaluation\EvaluationsIndexVM;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class EvaluationController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new EvaluationsIndexVM())->toArray()));
    }


    /**
     * @throws UnknownProperties
     */
    public function store(StoreEvaluationRequest $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $evaluationDTO = EvaluationDTO::fromRequest($data);
        $evaluation = EvaluationStoreAction::execute($evaluationDTO);
        return response()->json(Response::success($evaluation), 200);
    }


    /**
     * @throws UnknownProperties
     */

    public function update(UpdateEvaluationRequest $request,$id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $evaluationDTO = EvaluationDTO::fromRequest($data);
        $evaluation = EvaluationUpdateAction::execute($evaluationDTO,$id);
        return response()->json(Response::success($evaluation));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(EvaluationDestroyAction::execute($id)));
    }



}

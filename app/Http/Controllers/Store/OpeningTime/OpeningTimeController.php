<?php

namespace App\Http\Controllers\Store\OpeningTime;

use App\Domain\OpeningTimes\Actions\OpeningTimeUpdateAction;
use App\Domain\OpeningTimes\DTO\OpeningTimeDTO;
use App\Domain\OpeningTimes\Actions\OpeningTimeDestroyAction;
use App\Domain\OpeningTimes\Actions\OpeningTimeStoreAction;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\OpeningTime\StoreOpeningTimeRequest;
use App\Http\ViewModels\Store\OpeningTime\OpeningTimeIndexVM;
use App\Http\ViewModels\Store\OpeningTime\OpeningTimeShowVM;

class OpeningTimeController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OpeningTimeIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OpeningTimeShowVM($id))->toArray()));
    }

    /**
     * @throws
     */
    public function store(StoreOpeningTimeRequest $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $openingTimeDTO = OpeningTimeDTO::fromRequest($data);
        $openingTime = OpeningTimeStoreAction::execute($openingTimeDTO);
        return response()->json(Response::success($openingTime), 200);
    }


    /**
     * @throws
     */

    public function update(StoreOpeningTimeRequest $request,$id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $openingTimeDTO = OpeningTimeDTO::fromRequest($data);
        $openingTime = OpeningTimeUpdateAction::execute($openingTimeDTO,$id);
        return response()->json(Response::success($openingTime), 200);
    }

    /**
     * @throws
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(OpeningTimeDestroyAction::execute($id)));
    }
}

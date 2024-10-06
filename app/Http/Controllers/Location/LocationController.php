<?php

namespace App\Http\Controllers\Location;

use App\Domain\Locations\Actions\LocationDestroyAction;
use App\Domain\Locations\Actions\LocationStoreAction;
use App\Domain\Locations\Actions\LocationUpdateAction;
use App\Domain\Locations\DTO\LocationDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\StoreLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;
use App\Http\ViewModels\Location\LocationIndexVM;
use App\Http\ViewModels\Location\LocationShowVM;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class LocationController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new LocationIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new LocationShowVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreLocationRequest $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $locationDTO = LocationDTO::fromRequest($data);
        $location = LocationStoreAction::execute($locationDTO);
        return response()->json(Response::success($location), 200);
    }


    /**
     * @throws UnknownProperties
     */

    public function update(UpdateLocationRequest $request,$id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();

        $locationDTO = LocationDTO::fromRequest($data);
        $location = LocationUpdateAction::execute($locationDTO,$id);

        return response()->json(Response::success($location));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(LocationDestroyAction::execute($id)));
    }
}

<?php

namespace App\Http\Controllers\Location;

use App\Domain\Locations\Actions\City\CityDestroyAction;
use App\Domain\Locations\Actions\City\CityStoreAction;
use App\Domain\Locations\Actions\City\CityUpdateAction;
use App\Domain\Locations\DTO\CityDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\StoreCityRequest;
use App\Http\Requests\Location\UpdateCityRequest;
use App\Http\ViewModels\City\CityIndexVM;
use App\Http\ViewModels\City\CityShowVM;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CityController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new CityIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new CityShowVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreCityRequest $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $cityDTO = CityDTO::fromRequest($data);
        $city = CityStoreAction::execute($cityDTO);
        return response()->json(Response::success($city), 200);
    }


    /**
     * @throws UnknownProperties
     */

    public function update(UpdateCityRequest $request,$id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $cityDTO = CityDTO::fromRequest($data);
        $city = CityUpdateAction::execute($cityDTO,$id);

        return response()->json(Response::success($city));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(CityDestroyAction::execute($id)));
    }
}

<?php

namespace App\Http\Controllers\Store;

use App\Domain\Stores\Actions\StoreCreateAction;
use App\Domain\Stores\Actions\StoreDestroyAction;
use App\Domain\Stores\Actions\StoreUpdateAction;
use App\Domain\Stores\DTO\StoreDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\AddStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Http\ViewModels\Store\MyStoreVM;
use App\Http\ViewModels\Store\StorePublicIndexVM;
use App\Http\ViewModels\Store\StoreShowVM;
use App\Http\ViewModels\Store\StoresIndexVM;

class StoreController extends Controller
{
    public function public($language_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new StorePublicIndexVM($language_id))->toArray()));
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new StoresIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new StoreShowVM($id))->toArray()));
    }

    public function my_store(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new MyStoreVM())->toArray()));
    }


    /**
     * @throws
     */
    public function store(AddStoreRequest $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $storeDTO = StoreDTO::fromRequest($data);
        $store = StoreCreateAction::execute($storeDTO);
        return response()->json(Response::success($store), 200);
    }


    /**
     * @throws
     */

    public function update(UpdateStoreRequest $request,$id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $storeDTO = StoreDTO::fromRequest($data);
        $store = StoreUpdateAction::execute($storeDTO,$id);
        return response()->json(Response::success($store), 200);
    }

    /**
     * @throws
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(StoreDestroyAction::execute($id)));
    }
}

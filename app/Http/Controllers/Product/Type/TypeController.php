<?php

namespace App\Http\Controllers\Product\Type;

use App\Domain\Categories\Model\Category;
use App\Domain\Types\Actions\TypeDestroyAction;
use App\Domain\Types\Actions\TypeStoreAction;
use App\Domain\Types\Actions\TypeUpdateAction;
use App\Domain\Types\DTO\TypeDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Category\StoreCategoryRequest;
use App\Http\Requests\Product\Type\StoreTypeRequest;
use App\Http\Requests\Product\Type\UpdateTypeRequest;
use App\Http\ViewModels\Product\Type\TypeIndexVM;
use App\Http\ViewModels\Product\Type\TypeShowVM;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class TypeController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new TypeIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new TypeShowVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public static function store(StoreTypeRequest $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        for ($i = 0; $i < count($request->type); $i++) {
            $typeDTO = TypeDTO::fromRequest($data, $i);
            $type[$i] = TypeStoreAction::execute($typeDTO);
        }
        return response()->json(Response::success($type), 200);
    }

    public static function storeInCategory(StoreTypeRequest $request,$category_id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        for ($i = 0; $i < count($request->type); $i++) {
            $typeDTO = TypeDTO::fromRequest($data, $i);
            $type[$i] = TypeStoreAction::execute($typeDTO,$category_id);
        }
        return response()->json(Response::success($type), 200);
    }


    /**
     * @throws UnknownProperties
     */

    public static function update(UpdateTypeRequest $request,$id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        for ($i = 0; $i < count($request->type); $i++) {
            $typeDTO = TypeDTO::fromRequest($data, $i);
            $type = TypeUpdateAction::execute($typeDTO, $id);
        }
        return response()->json(Response::success($type));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(TypeDestroyAction::execute($id)));
    }
}

<?php

namespace App\Http\Controllers\Product\Category;

use App\Domain\Categories\Actions\CategoryDestroyAction;
use App\Domain\Categories\Actions\CategoryStoreAction;
use App\Domain\Categories\Actions\CategoryStoreWithProductAction;
use App\Domain\Categories\Actions\CategoryUpdateAction;
use App\Domain\Categories\DTO\CategoryDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\Type\TypeController;
use App\Http\Requests\Product\Category\StoreCategoryRequest;
use App\Http\Requests\Product\Category\UpdateCategoryRequest;
use App\Http\Requests\Product\Type\StoreTypeRequest;
use App\Http\ViewModels\Product\Category\CategoryIndexVM;
use App\Http\ViewModels\Product\Category\CategoryShowVM;
use Illuminate\Support\Facades\DB;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CategoryController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new CategoryIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new CategoryShowVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public static function store(StoreCategoryRequest $request, StoreTypeRequest $requestType)
    {
            //Store Category
            $data = $request->validated();
            $categoryDTO = CategoryDTO::fromRequest($data);
            $category = CategoryStoreAction::execute($categoryDTO);
            //Store Type
            TypeController::store($requestType);
            return $category;
    }

    /**
     * @throws UnknownProperties
     */
    public static function storeTypes(StoreCategoryRequest $request, StoreTypeRequest $requestType, $product_id): \Illuminate\Http\JsonResponse
    {
        //Store Category
        $data = $request->validated();
        $categoryDTO = CategoryDTO::fromRequest($data);
        $category = CategoryStoreWithProductAction::execute($categoryDTO,$product_id);
        //Store Type
       $type = TypeController::store($requestType);
        return $type;
    }

    /**
     * @throws UnknownProperties
     */

    public static function update(UpdateCategoryRequest $request, $id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $categoryDTO = CategoryDTO::fromRequest($data);
        $category = CategoryUpdateAction::execute($categoryDTO, $id);

        return response()->json(Response::success($category));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(CategoryDestroyAction::execute($id)));
    }
}

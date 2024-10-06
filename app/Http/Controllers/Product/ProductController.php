<?php

namespace App\Http\Controllers\Product;

use App\Domain\Products\Actions\ProductAprovedeAction;
use App\Domain\Products\Actions\ProductDestroyAction;
use App\Domain\Products\Actions\ProductStoreAction;
use App\Domain\Products\Actions\ProductUpdateAction;
use App\Domain\Products\DTO\ProductDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\Category\CategoryController;
use App\Http\Requests\Product\AprovedProductRequest;
use App\Http\Requests\Product\Category\StoreCategoryRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\Type\StoreTypeRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\ViewModels\Product\AllProductVM;
use App\Http\ViewModels\Product\FilterBySectionANDStatusProductVM;
use App\Http\ViewModels\Product\FilterByStatusProductVM;
use App\Http\ViewModels\Product\MyProductsVM;
use App\Http\ViewModels\Product\MyProductVM;
use App\Http\ViewModels\Product\ProductIndexVM;
use App\Http\ViewModels\Product\ProductRequestsVM;
use App\Http\ViewModels\Product\ProductShowVM;
use App\Http\ViewModels\Product\ProductWebIndexVM;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ProductController extends Controller
{
    public function public($store_id, $section_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new ProductIndexVM($store_id, $section_id))->toArray()));
    }

    public function public_web($store_id, $section_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new ProductWebIndexVM($store_id, $section_id))->toArray()));
    }

    public function my_products(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new MyProductsVM())->toArray()));
    }

    public function all_products_for_store($store_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new AllProductVM($store_id))->toArray()));
    }

    public function filter_by_status($status_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new FilterByStatusProductVM($status_id))->toArray()));
    }

    public function filter_by_section_status($section_id, $status_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new FilterBySectionANDStatusProductVM($section_id, $status_id))->toArray()));
    }

    public function show($store_id, $product_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new ProductShowVM($store_id, $product_id))->toArray()));
    }

    public function show_my_product($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new MyProductVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public static function store(StoreProductRequest $request, StoreCategoryRequest $requestCategory, StoreTypeRequest $requestType)
    : \Illuminate\Http\JsonResponse
    {
        //Store Category And Types
        try {
           $category = null;
            if($request->check_type == 1)
            $category = CategoryController::store($requestCategory, $requestType);
            //Store Product
            if($category == null) {
                $category_id = null;
            } else $category_id = $category->id;
            $data = $request->validated();
            $productDTO = ProductDTO::fromRequest($data);
            $productDTO = ProductStoreAction::execute($productDTO ,$category_id);
        } catch (\Exception $e) {
            return response()->json(Response::error('Error'), 400);
        }
        return response()->json(Response::success($productDTO), 200);
    }


    /**
     * @throws UnknownProperties
     */

    public static function update(UpdateProductRequest $request, $id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $productDTO = ProductDTO::fromRequest($data);
        $product = ProductUpdateAction::execute($productDTO, $id);
        return response()->json(Response::success($product));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(ProductDestroyAction::execute($id)));
    }


    public static function requests(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new ProductRequestsVM())->toArray()));
    }

    public static function accept(AprovedProductRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $productDTO = ProductDTO::fromRequest($data);
        $product = ProductAprovedeAction::execute($productDTO, $id);
        return response()->json(Response::success($product));
    }
}

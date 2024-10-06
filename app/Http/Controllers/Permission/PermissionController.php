<?php

namespace App\Http\Controllers\Permission;

use App\Domain\Permissions\Actions\PermissionDestroyAction;
use App\Domain\Permissions\Actions\PermissionStoreAction;
use App\Domain\Permissions\Actions\PermissionStorForMerchanteAction;
use App\Domain\Permissions\Actions\PermissionUpdateAction;
use App\Domain\Permissions\DTO\PermissionDTO;
use App\Domain\Permissions\DTO\PermissionUpDTO;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Http\ViewModels\Permission\PermissionIndexVM;
use App\Http\ViewModels\Permission\PermissionShowVM;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PermissionController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new PermissionIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new PermissionShowVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public static function store(StorePermissionRequest $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        for ($i = 0; $i < count($request->permission_id); $i++) {
            $permissionDTO = PermissionDTO::fromRequest($data,$i);
            $permission[$i] = PermissionStoreAction::execute($permissionDTO);
        }
        return response()->json(Response::success($permission), 200);
    }



    public static function store_for_merchant(StorePermissionRequest $request, $primer_user_id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        for ($i = 0; $i < count($request->permission_id); $i++) {
            $permissionDTO = PermissionDTO::fromRequest($data,$i);
            $permission[$i] = PermissionStorForMerchanteAction::execute($permissionDTO, $primer_user_id);
        }
        return response()->json(Response::success($permission), 200);
    }

    /**
     * @throws UnknownProperties
     */

    public static function update(UpdatePermissionRequest $request,$permission_id,$primer_user_id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $permissionDTO = PermissionUpDTO::fromRequest($data);
        $permission = PermissionUpdateAction::execute($permissionDTO,$permission_id ,$primer_user_id);
        return response()->json(Response::success($permission));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($permission_id,$primer_user_id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(PermissionDestroyAction::execute($permission_id,$primer_user_id)));
    }
}

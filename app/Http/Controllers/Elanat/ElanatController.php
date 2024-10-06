<?php

namespace App\Http\Controllers\Elanat;

use App\Domain\Elanats\Actions\ElanatDestroyAction;
use App\Domain\Elanats\Actions\ElanatStoreAction;
use App\Domain\Elanats\Actions\ElanatUpdateAction;
use App\Domain\Elanats\DTO\ElanatDTO;
use App\Domain\Notifications\Model\Notification;
use App\Domain\Users\Users\Model\User;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Requests\Elanat\StoreElanatRequest;
use App\Http\Requests\Elanat\UpdateElanatRequest;
use App\Http\ViewModels\Elanat\ElanatIndexVM;
use App\Http\ViewModels\Elanat\ElanatShowVM;
use App\Notifications\FcmNotification;

class ElanatController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new ElanatIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new ElanatShowVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreElanatRequest $request): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $elanatDTO = ElanatDTO::fromRequest($data);
        try {
            $elanat = ElanatStoreAction::execute($elanatDTO);
            $users = User::whereNotNull('device_token')->get();
            $title = Notification::where('type_id', 1)
                ->pluck('title')
                ->first();
            $message = Notification::where('type_id', 1)
                ->pluck('message')
                ->first();
            foreach ($users as $user) {
                $user->notify(new FcmNotification($title, $message));
            }
        } catch (\Exception $e) {
            return response()->json(Response::error('Error Added'), 400);
        }
        return response()->json(Response::success($elanat), 200);
    }


    /**
     * @throws UnknownProperties
     */

    public function update(UpdateElanatRequest $request, $id): \Illuminate\Http\JsonResponse
    {

        $data = $request->validated();
        $elanatDTO = ElanatDTO::fromRequest($data);
        $elanat = ElanatUpdateAction::execute($elanatDTO, $id);

        return response()->json(Response::success($elanat));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(ElanatDestroyAction::execute($id)));
    }
}

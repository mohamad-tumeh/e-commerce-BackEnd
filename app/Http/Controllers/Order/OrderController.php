<?php

namespace App\Http\Controllers\Order;

use App\Domain\Notifications\Model\Notification;
use App\Domain\Orders\Actions\OrderDestroyAction;
use App\Domain\Orders\Actions\OrderStoreAction;
use App\Domain\Orders\Actions\OrderUpdateAction;
use App\Domain\Orders\DTO\OrderDTO;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use App\Domain\Users\Users\Model\User;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\ViewModels\Order\OrderIndexVM;
use App\Http\ViewModels\Order\OrderShowVM;
use App\Notifications\FcmNotification;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class OrderController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OrderIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OrderShowVM($id))->toArray()));
    }

    /**
     */
    public static function store(StoreOrderRequest $request)
    {

        $data = $request->validated();
        $orderDTO = OrderDTO::fromRequest($data);
        $order = OrderStoreAction::execute($orderDTO);
        return $order;
    }


    /**
     * @throws UnknownProperties
     */

    public static function update(UpdateOrderRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $orderDTO = OrderDTO::fromRequest($data);
            $order = OrderUpdateAction::execute($orderDTO, $id);

            $user = User::whereNotNull('device_token')
                ->whereHas('order', function ($q) use ($order){
                    $q->where('user_id', $order->user_id);
                })
                ->first();
            $title = Notification::where('type_id', 3)
                ->pluck('title')
                ->first();
            $message = Notification::where('type_id', 3)
                ->pluck('message')
                ->first();
            if ($user == null)
                return response()->json(Response::error('Error'), 400);
            $user->notify(new FcmNotification($title, $message));
        } catch (\Exception $e) {
            return response()->json(Response::error('Error'), 400);
        }

        return response()->json(Response::success($order));
    }

    /**
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(OrderDestroyAction::execute($id)));
    }
}

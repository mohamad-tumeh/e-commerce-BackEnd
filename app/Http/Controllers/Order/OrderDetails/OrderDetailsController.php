<?php

namespace App\Http\Controllers\Order\OrderDetails;

use App\Domain\Notifications\Model\Notification;
use App\Domain\OrderDetails\Actions\AddTypeAction;
use App\Domain\OrderDetails\Actions\OrderDetailsDestroyAction;
use App\Domain\OrderDetails\Actions\OrderDetailsStoreAction;
use App\Domain\OrderDetails\Actions\OrderDetailsUpdateAction;
use App\Domain\OrderDetails\DTO\OrderDetailsDTO;
use App\Domain\OrderDetails\DTO\OrderDetailsTypeDTO;
use App\Domain\Types\Model\Type;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Requests\Order\OrderDetails\StoreOrderDetailsRequest;
use App\Http\Requests\Order\OrderDetails\UpdateOrderDetailsRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\ViewModels\Order\BillIndexVM;
use App\Http\ViewModels\Order\OrderDetails\MyOrderVM;
use App\Http\ViewModels\Order\OrderDetails\OrderDetailsBeforDayVM;
use App\Http\ViewModels\Order\OrderDetails\OrderDetailsIndexVM;
use App\Http\ViewModels\Order\OrderDetails\OrderDetailsSameDayVM;
use App\Http\ViewModels\Order\OrderDetails\OrderDetailsShowVM;
use App\Http\ViewModels\Order\OrderDetails\OrderSearchDateVM;
use App\Notifications\FcmNotification;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

use function PHPSTORM_META\type;

class OrderDetailsController extends Controller
{
    public function index($order_status_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OrderDetailsIndexVM($order_status_id))->toArray()));
    }

    public function befor_day($order_status_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OrderDetailsBeforDayVM($order_status_id))->toArray()));
    }

    public function same_day($order_status_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OrderDetailsSameDayVM($order_status_id))->toArray()));
    }

    public function search_date($date, $order_status_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OrderSearchDateVM($date, $order_status_id))->toArray()));
    }

    public function my_order(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new MyOrderVM())->toArray()));
    }

    public function bill(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new BillIndexVM())->toArray()));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Response::success((new OrderDetailsShowVM($id))->toArray()));
    }

    /**
     * @throws UnknownProperties
     */
    public function store(StoreOrderDetailsRequest $request, StoreOrderRequest $requestOrder)
    : \Illuminate\Http\JsonResponse
    {

        //Store Order
        try {
            $o = OrderController::store($requestOrder);
            if ($o->status() == 400)
                return $o;
            //Store Order Details
            $data = $request->validated();
            $count = count( $data['type_product']);

            for ($i = 0; $i < $count; $i++) {
                $orderDTO = OrderDetailsDTO::fromRequest($data,$i);
                $order = OrderDetailsStoreAction::execute($orderDTO, $i);

                $merchant = PrimerUser::whereNotNull('device_token')
                    ->where('type_id', 2)
                    ->whereHas('store.product.order_details', function ($q) use ($order) {
                        $q->where('id', $order->id);
                    })
                    ->first();
                $title = Notification::where('type_id', 2)
                    ->pluck('title')
                    ->first();
                $message = Notification::where('type_id', 2)
                    ->pluck('message')
                    ->first();
            }

            if ($merchant == null)
                return response()->json(Response::error('Error Order'), 400);
            $merchant->notify(new FcmNotification($title, $message));
        } catch (\Exception $e) {
            return response()->json(Response::error('Error Order'), 400);
        }
        //return Data
        return response()->json(Response::success($order), 200);
    }


    /**
     * @throws UnknownProperties
     */

    public function update(
        UpdateOrderDetailsRequest $request,
        $details_id,
        UpdateOrderRequest $orderRequest,
        $order_id
    ): \Illuminate\Http\JsonResponse {
        OrderController::update($orderRequest, $order_id);
        $data = $request->validated();
        for ($i = 0; $i < count($request->product_id); $i++) {
            $orderDTO = OrderDetailsDTO::fromRequest($data, $i);
            $order = OrderDetailsUpdateAction::execute($orderDTO, $details_id, $order_id);
        }
        return response()->json(Response::success($order));
    }

    /**
     * @throws UnknownProperties
     */

    public function destroy($id): \Illuminate\Http\JsonResponse
    {

        return response()->json(Response::success(OrderDetailsDestroyAction::execute($id)));
    }
}

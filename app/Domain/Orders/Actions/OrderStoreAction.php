<?php


namespace App\Domain\Orders\Actions;

use App\Domain\Locations\Model\Location;
use App\Domain\Orders\DTO\OrderDTO;
use App\Domain\Orders\Model\Order;
use App\Domain\Sections\DTO\SectionDTO;
use App\Helpers\Response;
use Illuminate\Support\Facades\Auth;

class OrderStoreAction
{
    public static function execute(OrderDTO $orderDTO)
    {
        $location = Location::query()->get()
            ->where('user_id', Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id())
            ->where('is_active', 1)
            ->find($orderDTO->location_id);

        if ($location) {
            $order = new Order($orderDTO->toArray());
            $order->user_id = Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id();
            $order->order_status_id = 1;
            $order->location_id = $location->id;
            $order->save();
            return response()->json(Response::success($order), 200);
        } else    return response()->json(Response::error('The location not found'), 400);
    }
}

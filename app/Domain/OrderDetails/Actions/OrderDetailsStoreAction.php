<?php


namespace App\Domain\OrderDetails\Actions;

use App\Domain\OrderDetails\DTO\OrderDetailsDTO;
use App\Domain\OrderDetails\Model\OrderDetail;
use App\Domain\Orders\Model\Order;
use App\Domain\Products\Model\Product;
use App\Domain\Types\Model\Type;
use App\Domain\Users\Users\Model\User;
use Illuminate\Support\Facades\Auth;
class OrderDetailsStoreAction
{
    public static function execute(OrderDetailsDTO $orderDetailsDTO ,$i)
    {


        $user = User::where('id', Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id())->first();
        if ($user->verify == 1 && $user->is_block) {
            $orderDetails = new OrderDetail($orderDetailsDTO->toArray());
            $orderDetails->order_id = Order::query()->get()->last()->id;
            $product = Product::query()->get()->find($orderDetailsDTO->product_id);
            if ($product->is_active == 0) {
                return 'This Product Finish.';
            }
            if ($product->product_status_id != 1) {
                return 'Error';
            }
            $orderDetails->price = $product->price;
            //type
                if ($orderDetailsDTO->type_id == 0) {
                    $orderDetails->type_id = null;
                } else {
                    $type = Type::select('price')->find($orderDetailsDTO->type_id);
                    $orderDetails->type_price = $type->price;

            }
            $orderDetails->save();
            return $orderDetails;
        }
        return "You are do not access";
    }
}

<?php

namespace App\Http\Controllers\Notification;

use App\Domain\Notifications\Model\Notification;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use App\Domain\Users\Users\Model\User;
use App\Http\Controllers\Controller;
use App\Notifications\FcmNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{


    public static function send_elan_notification()
    {
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
    }

    public static function send_new_order_notification($order_id)
    {
        $merchant = PrimerUser::whereNotNull('device_token')
            ->where('type_id', 2)
            ->whereHas('store.product.order_details', function ($q) use ($order_id) {
                $q->where('id', $order_id);
            })
            ->first();
        $title = Notification::where('type_id', 2)
            ->pluck('title')
            ->first();
        $message = Notification::where('type_id', 2)
            ->pluck('message')
            ->first();
        $merchant->notify(new FcmNotification($title, $message));
    }

    public static function send_change_status_order_notification()
    {
        $user = User::whereNotNull('device_token')
            ->whereHas('order', function ($q) {
                $q->where('user_id', Auth::guard('user')->id() ?? Auth::guard('user_socialite')->id());
            })
            ->first();
        $title = Notification::where('type_id', 3)
            ->pluck('title')
            ->first();
        $message = Notification::where('type_id', 3)
            ->pluck('message')
            ->first();
        $user->notify(new FcmNotification($title, $message));
     }

  
}

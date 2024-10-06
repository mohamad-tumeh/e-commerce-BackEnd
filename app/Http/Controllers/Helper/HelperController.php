<?php

namespace App\Http\Controllers\Helper;

use App\Domain\Notifications\Model\Notification;
use App\Domain\Notifications\Model\TypeNotification;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Notifications\NotificationRequest;
use App\Http\ViewModels\Helper\LanguageIndexVM;
use App\Http\ViewModels\Helper\OrdersStatusIndexVM;
use App\Http\ViewModels\Helper\ProductStatusIndexVM;
use App\Http\ViewModels\Helper\StoreStatusIndexVM;
use App\Http\ViewModels\Helper\TagIndexVM;
use App\Http\ViewModels\Helper\TypeNotificationVM;
use App\Http\ViewModels\Helper\TypeUserIndexVM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HelperController extends Controller
{
    public function get_order_statuses()
    {
        return response()->json(Response::success((new OrdersStatusIndexVM())->toArray()));
    }

    public function get_product_statuses()
    {
        return response()->json(Response::success((new ProductStatusIndexVM())->toArray()));
    }

    public function get_store_statuses()
    {
        return response()->json(Response::success((new StoreStatusIndexVM())->toArray()));
    }

    public function get_tags()
    {
        return response()->json(Response::success((new TagIndexVM())->toArray()));
    }

    public function get_languages()
    {
        return response()->json(Response::success((new LanguageIndexVM())->toArray()));
    }

    public function get_types()
    {
        return response()->json(Response::success((new TypeNotificationVM())->toArray()));
    }

    public function get_user_types()
    {
        return response()->json(Response::success((new TypeUserIndexVM())->toArray()));
    }

    public function get_notifications()
    {
        return response()->json(Response::success(Notification::with('type')->get()));
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::find($id);
        if ($request['title']) $notification['title'] = $request['title'];
        if ($request['message'] != null) $notification['message'] = $request['message'];
        $notification->update();
        return response()->json(Response::success($notification));
    }
}

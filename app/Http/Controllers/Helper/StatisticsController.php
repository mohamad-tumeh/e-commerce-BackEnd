<?php

namespace App\Http\Controllers\Helper;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\ViewModels\Helper\statistics\CountOrderVM;
use App\Http\ViewModels\Helper\statistics\CountStoreVM;
use App\Http\ViewModels\Helper\statistics\CountUserVM;
use App\Http\ViewModels\Helper\statistics\DailyOrdersIndexVM;
use App\Http\ViewModels\Helper\statistics\DeliveredOrdersIndexVM;
use App\Http\ViewModels\Helper\statistics\TotalSalesIndexVM;

class StatisticsController extends Controller
{
    public function total_sales() {
        return response()->json(Response::success((new TotalSalesIndexVM())->toArray()));
    }

    public function delivered_orders() {
        return response()->json(Response::success((new DeliveredOrdersIndexVM())->toArray()));
    }

    public function daily_orders() {
        return response()->json(Response::success((new DailyOrdersIndexVM())->toArray()));
    }

    
    public function count_store() {
        return response()->json(Response::success((new CountStoreVM())->toArray()));
    }

    public function count_user() {
        return response()->json(Response::success((new CountUserVM())->toArray()));
    }

    public function count_order() {
        return response()->json(Response::success((new CountOrderVM())->toArray()));
    }

}

<?php

namespace App\Http\Controllers\Language;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class LocolizationController extends Controller
{
    public function product_status($locale){     
        app()->setLocale($locale);
        return response()->json(Response::success(trans('product_status')));
    }

    public function order_status($locale){     
        app()->setLocale($locale);
        return response()->json(Response::success(trans('order_status')));
    }

    public function cities($locale){     
        app()->setLocale($locale);
        return response()->json(Response::success(trans('cities')));
    }


    public function tags($locale){     
        app()->setLocale($locale);
        return response()->json(Response::success(trans('tags')));
    }

    public function permissions($locale){     
        app()->setLocale($locale);
        return response()->json(Response::success(trans('permissions')));
    }
}

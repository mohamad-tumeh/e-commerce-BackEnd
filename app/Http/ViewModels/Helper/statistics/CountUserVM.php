<?php

namespace App\Http\ViewModels\Helper\statistics;

use App\Domain\Orders\Model\Order;
use App\Domain\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\DB;

class CountUserVM implements Arrayable
{
    private function data(){
        return User::has('order')
        ->select('language_id', DB::raw ('COUNT(*) as count'))
        ->groupBy('language_id')
        ->get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

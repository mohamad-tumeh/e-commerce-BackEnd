<?php

namespace App\Http\ViewModels\Helper;

use App\Domain\Notifications\Model\TypeNotification;
use App\Domain\Stores\Model\StoresStatus;
use Illuminate\Contracts\Support\Arrayable;

class TypeNotificationVM implements Arrayable
{
    private function data(){
        return TypeNotification::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

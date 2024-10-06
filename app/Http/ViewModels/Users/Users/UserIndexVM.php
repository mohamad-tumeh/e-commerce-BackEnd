<?php

namespace App\Http\ViewModels\Users\Users;

use App\Domain\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;

class UserIndexVM implements Arrayable
{
    private function data(){
        return User::with('language')->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

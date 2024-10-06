<?php

namespace App\Http\ViewModels\Users\Users;

use App\Domain\Users\Users\DTO\UserDTO;
use App\Domain\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class UserProfileVM implements Arrayable
{
    private $user;

    public function __construct()
    {
        $this->user = User::with('language')
        ->where('id',Auth::guard('user')->id())
            ->orWhere('id',Auth::guard('user_socialite')->id())->first();
    }

    /**
     * @return User
     */
    public function toArray()
    {
        return $this->user;
    }
}

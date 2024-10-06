<?php

namespace App\Http\ViewModels\Users\Users;

use App\Domain\Users\Users\DTO\UserDTO;
use App\Domain\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;

class UserShowVM implements Arrayable
{
    private $user;

    public function __construct(UserDTO|User $user)
    {
        if ($user instanceof UserDTO) {
            if ($user->id !== null)
                $this->user = User::find($user->id);
            elseif ($user->email !== null)
                $this->user = User::where('email', $user->email)->first();
            else
                $this->user = User::where('phone_number', $user->phone_number)->first();
        }
    }

    /**
     * @return User
     */
    public function toArray()
    {
        return $this->user;
    }
}

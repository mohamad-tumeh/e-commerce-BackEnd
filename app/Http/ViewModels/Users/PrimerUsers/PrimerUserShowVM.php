<?php

namespace App\Http\ViewModels\Users\PrimerUsers;

use App\Domain\Users\PrimerUsers\DTO\PrimerUserDTO;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Contracts\Support\Arrayable;

class PrimerUserShowVM implements Arrayable
{
    private $primerUser;

    public function __construct(PrimerUserDTO|PrimerUser $primerUser)
    {
        if ($primerUser instanceof PrimerUserDTO) {
            if ($primerUser->id !== null)
                $this->primerUser = PrimerUser::with('permission_primer_user.permission', 'type')->find($primerUser->id);
            elseif ($primerUser->email !== null)
                $this->primerUser = PrimerUser::with('permission_primer_user.permission', 'type')->where('email', $primerUser->email)->first();
            else
                $this->primerUser = PrimerUser::with('permission_primer_user.permission', 'type')->where('phone_number', $primerUser->phone_number)->first();
        }
    }

    /**
     * @return User
     */
    public function toArray()
    {
        return $this->primerUser;
    }
}

<?php

namespace App\Http\ViewModels\Users\PrimerUsers;

use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Auth;

class PrimerUserProfileVM implements Arrayable
{
    private $primerUser;

    public function __construct()
    {
        $this->primerUser = PrimerUser::with('permission_primer_user.permission', 'type')->where('id', Auth::guard('primer_user')->id())->get();
    }

    /**
     * @return PrimerUser
     */
    public function toArray()
    {
        return $this->primerUser;
    }
}

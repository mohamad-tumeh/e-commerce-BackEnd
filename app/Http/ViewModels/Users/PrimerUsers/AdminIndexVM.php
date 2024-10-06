<?php

namespace App\Http\ViewModels\Users\PrimerUsers;

use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Contracts\Support\Arrayable;

class AdminIndexVM implements Arrayable
{
    private function data()
    {
        return PrimerUser::with('permission_primer_user.permission', 'type')->where('type_id', 1)->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

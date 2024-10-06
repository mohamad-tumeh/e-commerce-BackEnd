<?php

namespace App\Http\ViewModels\Users\PrimerUsers;

use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Contracts\Support\Arrayable;

class MerchantIndexVM implements Arrayable
{
    private function data()
    {
        return PrimerUser::with('store', 'permission_primer_user.permission', 'type')->where('type_id', 2)->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

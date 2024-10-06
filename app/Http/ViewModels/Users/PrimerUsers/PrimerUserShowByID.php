<?php

namespace App\Http\ViewModels\Users\PrimerUsers;

use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Contracts\Support\Arrayable;

class PrimerUserShowByID implements Arrayable
{
    private $primerUser;
    public function __construct($id)
    {
        $this->primerUser = PrimerUser::with('store', 'permission_primer_user.permission', 'type')
            ->find($id);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->primerUser;
    }


}

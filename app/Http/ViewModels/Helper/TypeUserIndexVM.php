<?php

namespace App\Http\ViewModels\Helper;

use App\Domain\Users\PrimerUsers\Model\TypeUser;
use Illuminate\Contracts\Support\Arrayable;

class TypeUserIndexVM implements Arrayable
{
    private function data(){
        return TypeUser::get();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

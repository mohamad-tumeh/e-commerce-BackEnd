<?php

namespace App\Http\ViewModels\Evaluation;

use App\Domain\Evaluations\Model\Evaluation;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\DB;

class EvaluationsIndexVM implements Arrayable
{

    private function data(){
        return
           Evaluation::with('store')
            ->select('store_id',DB::raw('AVG(value) as Value'))
            ->groupBy('store_id')
            ->paginate(25);
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}

<?php

namespace App\Domain\OpeningTimes\Model;

use App\Domain\Stores\Model\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningTimes extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'day',
        'from',
        'to',
        'state',
        'store_id',
    ];

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Store::class);
    }
}

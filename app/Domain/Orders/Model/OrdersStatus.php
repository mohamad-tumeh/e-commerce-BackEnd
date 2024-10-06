<?php

namespace App\Domain\Orders\Model;

use App\Domain\Products\Model\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'state',
    ];

    public function order(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }
}

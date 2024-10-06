<?php

namespace App\Domain\Orders\Model;

use App\Domain\Locations\Model\City;
use App\Domain\Locations\Model\Location;
use App\Domain\OrderDetails\Model\OrderDetail;
use App\Domain\Users\Users\Model\User;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'date',
        'user_id',
        'location_id',
        'order_status_id',
        'promo_id',
        'transaction_key'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function order_status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OrdersStatus::class);
    }

    public function order_details(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}

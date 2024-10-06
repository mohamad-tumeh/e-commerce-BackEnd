<?php

namespace App\Domain\OrderDetails\Model;


use App\Domain\Orders\Model\Order;
use App\Domain\Products\Model\Product;
use App\Domain\Types\Model\Type;
use App\Domain\Users\Users\Model\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'order_id',
        'price',
        'type_id',
        'type_price'
    ];

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}

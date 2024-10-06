<?php

namespace App\Domain\Products\Model;

use App\Domain\Categories\Model\Category;
use App\Domain\Language\Model\Language;
use App\Domain\OrderDetails\Model\OrderDetail;
use App\Domain\Sections\Model\Section;
use App\Domain\Stores\Model\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'an_name',
        'image',
        'sku',
        'bar_code',
        'description',
        'an_description',
        'price',
        'is_active',
        'section_id',
        'category_id',
        'product_status_id',
        'massage',
        'store_id',

    ];

    public function section(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Section::class);
    }
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }
    public function product_status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(ProductStatus::class);
    }

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Store::class);
    }

    public function order_details(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }


}

<?php

namespace App\Domain\Sections\Model;

use App\Domain\Products\Model\Product;
use App\Domain\Stores\Model\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'section', 'an_section', 'is_active','massage','product_status_id'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Store::class);
    }


}

<?php

namespace App\Domain\Categories\Model;

use App\Domain\Products\Model\Product;
use App\Domain\Types\Model\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'category',
        'an_category'
    ];


    public function type(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Type::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Product::class);
    }
}

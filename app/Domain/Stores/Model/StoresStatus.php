<?php

namespace App\Domain\Stores\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoresStatus extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'state',
    ];

    public function store(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(related: Store::class);
    }

}

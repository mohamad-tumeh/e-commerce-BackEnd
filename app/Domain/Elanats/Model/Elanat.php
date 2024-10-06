<?php

namespace App\Domain\Elanats\Model;

use App\Domain\Stores\Model\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elanat extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['image','date','store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}

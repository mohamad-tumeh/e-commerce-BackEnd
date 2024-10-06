<?php

namespace App\Domain\Locations\Model;

use App\Domain\Language\Model\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityLanguage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'value',
        'city_id',
        'language_id'
    ];

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}

<?php

namespace App\Domain\Stores\Model;

use App\Domain\Evaluations\Model\Evaluation;
use App\Domain\Language\Model\Language;
use App\Domain\Locations\Model\City;
use App\Domain\OpeningTimes\Model\OpeningTimes;
use App\Domain\Products\Model\Product;
use App\Domain\Sections\Model\Section;
use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    use HasFactory;

    public $timestamps = false;
    /**
     * @var mixed|string
     */


    protected $fillable = [
        'name',
        'an_name',
        'post_code',
        'image',
        'cover',
        'phone_number',
        'bank_account_number',
        'store_status_id',
        'city_id',
        'tag_id',
        'language_id',
    ];

    public function evaluation(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Evaluation::class);
    }

    public function opening_time(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OpeningTimes::class);
    }

    public function store_status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(StoresStatus::class);
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function tag(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function primer_user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PrimerUser::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function section(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Section::class);
    }
    
}

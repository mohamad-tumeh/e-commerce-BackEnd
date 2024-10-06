<?php

namespace App\Domain\Faqs\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'title', 'text', 'type',
    ];
}

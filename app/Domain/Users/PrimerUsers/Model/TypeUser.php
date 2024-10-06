<?php

namespace App\Domain\Users\PrimerUsers\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        'type',
    ];

}

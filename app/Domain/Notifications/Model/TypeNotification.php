<?php

namespace App\Domain\Notifications\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeNotification extends Model
{
    use HasFactory;

  protected  $table = 'type_messages';
}

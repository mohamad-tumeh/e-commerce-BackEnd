<?php

namespace App\Domain\Notifications\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title','message','type_id'];

    public function type(){
        return $this->belongsTo(TypeNotification::class);
    }
}

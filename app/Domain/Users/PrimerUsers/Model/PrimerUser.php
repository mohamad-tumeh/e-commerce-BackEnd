<?php

namespace App\Domain\Users\PrimerUsers\Model;

use App\Domain\Permissions\Model\PermissionsPrimerUser;
use App\Domain\Stores\Model\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @method static where(string $string, $email)
 * @method static find($id)
 */
class PrimerUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'type_id',
        'store_id',
        'device_token'
    ];


    protected $hidden = [
        'password',
    ];


    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function permission_primer_user(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PermissionsPrimerUser::class);
    }

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TypeUser::class);
    }

    public function routeNotificationForFcm()
    {
        return $this->device_token;
    }
}

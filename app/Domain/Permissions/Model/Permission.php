<?php

namespace App\Domain\Permissions\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['permission'];

    public function permission_primer_user(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PermissionsPrimerUser::class);
    }
}

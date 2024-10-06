<?php

namespace App\Domain\Permissions\Model;

use App\Domain\Users\PrimerUsers\Model\PrimerUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionsPrimerUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['permission_id','primer_user_id'];

    public function permission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }

    public function primer_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PrimerUser::class);
    }
}

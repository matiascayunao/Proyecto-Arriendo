<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'rut';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class, 'n_rol,');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Usuario extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios';
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class, 'n_rol');
    }

    public function admin():bool
    {
        return $this->n_rol == 'admin';
    }

    public function ejecutivo():bool
    {
        return $this->n_rol == 'ejecutivo';
    }

}

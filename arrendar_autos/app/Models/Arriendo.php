<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Arriendo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'arriendos';

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'matricula_arriendo');

    }
    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class, 'tipo');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'rut_arrendatario');
    }
}

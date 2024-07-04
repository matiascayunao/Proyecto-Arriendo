<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arriendo extends Model
{
    use HasFactory;

    protected $table = 'arriendos';

    public function vehiculos(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'matricula_arriendo');

    }

    public function tipos(): BelongsTo
    {
        return $this->belongsTo(Tipo::class, 'tipo');
    }

    public function clientes(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'rut_arrendatario');
    }
}

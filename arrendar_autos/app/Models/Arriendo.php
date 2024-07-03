<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arriendo extends Model
{
    use HasFactory;

    protected $table = 'arriendos';

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'matricula_arriendo');

    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'rut_arrendatario');
    }

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class, 'tipo');
    }
}

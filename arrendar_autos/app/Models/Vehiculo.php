<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $primaryKey = 'matricula';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    
    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class, 'tipo_v');
    }
}

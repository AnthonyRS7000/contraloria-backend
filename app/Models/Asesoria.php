<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesoria extends Model
{
    use HasFactory;

    /**
     * Campos asignables de la entidad Asesoría.
     */
    protected $fillable = [
        'tema',
        'descripcion',
        'fecha_asesoria',
        'usuario_id',
    ];

    /**
     * Relación: Asesoría pertenece a un Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;

    /**
     * Campos asignables de la entidad Denuncia.
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'usuario_id',
    ];

    /**
     * Relación: Denuncia pertenece a un Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

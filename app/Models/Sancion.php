<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    use HasFactory;

    // Especifica el nombre correcto de la tabla
    protected $table = 'sanciones';

    protected $fillable = [
        'motivo',
        'descripcion',
        'monto',
        'usuario_id',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

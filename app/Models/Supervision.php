<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervision extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'supervisiones';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_supervision',
        'usuario_id',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

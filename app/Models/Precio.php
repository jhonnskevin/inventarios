<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $table = 'precios';

    protected $fillable = [
        'producto_id',
        'tipo_precio',
        'precio',
        'fecha_desde',
        'fecha_hasta',
        'estado',
        'eliminado',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

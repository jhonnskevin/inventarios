<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'lotes';

    protected $fillable = [
        'producto_id',
        'codigo',
        'fecha_vencimiento',
        'cantidad_inicial',
        'cantidad_actual',
        'costo_unitario',
        'estado',
        'eliminado',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function detalleTransacciones()
    {
        return $this->hasMany(DetalleTransaccion::class);
    }
}

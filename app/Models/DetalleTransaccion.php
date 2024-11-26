<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleTransaccion extends Model
{
    use HasFactory;

    protected $table = 'detalle_transacciones';

    protected $fillable = [
        'transaccion_id',
        'producto_id',
        'lote_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    public function transaccion()
    {
        return $this->belongsTo(Transaccion::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}

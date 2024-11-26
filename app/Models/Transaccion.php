<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';

    protected $fillable = [
        'tipo',
        'persona_id',
        'fecha',
        'nombre_comprobante',
        'numero_comprobante',
        'user_id',
        'total',
        'estado',
        'eliminado'
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleTransaccion::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

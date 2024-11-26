<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'alias',
        'descripcion',
        'codigo',
        'categoria_id',
        'tipo_id',
        'laboratorio_id',
        'cantidad_minima',
        'requiere_receta',
        'estado',
        'eliminado'
    ];

    //RELACIONES DE MODELO
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

    public function precios()
    {
        return $this->hasMany(Precio::class);
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }

    public function detalleTransacciones()
    {
        return $this->hasMany(DetalleTransaccion::class);
    }
}

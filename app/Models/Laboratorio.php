<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $table = 'laboratorios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'eliminado'
    ];


    //RELACIONES DE MODELO
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}

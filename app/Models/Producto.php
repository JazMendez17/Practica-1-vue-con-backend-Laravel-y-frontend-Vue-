<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Criterio 4.1: Permitir la asignación masiva de las columnas del catálogo
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'precio', 
        'stock'
    ];
}
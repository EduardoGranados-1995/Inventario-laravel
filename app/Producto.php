<?php

namespace App;

use App\Categoria;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['categoria_id', 'nombre_producto', 'detalles'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}

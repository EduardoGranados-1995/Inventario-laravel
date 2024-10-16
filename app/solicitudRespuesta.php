<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitudRespuesta extends Model
{
    protected $table='solicitud_respuesta';
    protected $fillable = ['solicitud_id', 'producto_id', 'estatus','ct_id'];
}

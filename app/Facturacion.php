<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    //
    protected $table = 'invoices';
    protected $fillable = ['id', 'total'];
}

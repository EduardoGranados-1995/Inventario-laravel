<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturacion;
use App\CentrosTrabajo;
use App\Categoria;
use App\Producto;
use App\Articulo;

use DB;

class FacturacionController extends Controller
{
    //
    public function index(){
        $facturas = Facturacion::count();

        $centros = CentrosTrabajo::OrderBy('clave_ct', 'ASC')->get();
        
        $categoria = Categoria::all();
        $producto = Producto::all();

        return view('Facturacion.facturacion', compact('facturas','centros','categoria','producto'));
    }
}

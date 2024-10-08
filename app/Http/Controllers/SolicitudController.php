<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentrosTrabajo;
use App\Producto;
use DB;

class SolicitudController extends Controller
{
    public function index(){
        $centros = CentrosTrabajo::all();
        $productos = Producto::all();

        return view('Solicitud.CrearSolicitud', compact('centros','productos'));
    }
}

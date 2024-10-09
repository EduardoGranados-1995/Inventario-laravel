<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentrosTrabajo;
use App\Producto;
use App\Solicitud;
use DB;

class SolicitudController extends Controller
{
    public function index(){
        $centros = CentrosTrabajo::all();
        $productos = Producto::all();

        return view('Solicitud.CrearSolicitud', compact('centros','productos'));
    }

    public function guardar(Request $request){
        $solicitud = new Solicitud();
        $solicitud->nombre = $request->input('nombre');
        $solicitud->ct_id = $request->input('centro');
        $solicitud->producto_id = $request->input('producto');
        $solicitud->cantidad = $request->input('cantidad');
        $solicitud->descripcion = $request->input('texto');
        $solicitud->save();

        return redirect()->back()->with('agregar', 'ok');

    }
}

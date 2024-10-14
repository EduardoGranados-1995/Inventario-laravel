<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\CentrosTrabajo;
use DB;

class SolicitudRespuestaController extends Controller
{
    public function index(){
        $solicitud = Solicitud::select('solicitud.*', 'centros_trabajo.nombre_ct')
        ->join('centros_trabajo', 'solicitud.ct_id', '=', 'centros_trabajo.clave_ct')
        ->get();

        return view('Solicitud.RespuestaSolicitud', ['solicitud' => $solicitud]);
    }

    public function detalles($id){
        $solicitud = DB::table('solicitud as s')
        ->join('productos as p', 's.producto_id', '=', 'p.id')
        ->select('s.*','p.clave_producto', 'p.nombre_producto')->where('s.id', $id)->get();
        
        return view('Solicitud.RespuestaDetalles', compact('solicitud'));
    }
}

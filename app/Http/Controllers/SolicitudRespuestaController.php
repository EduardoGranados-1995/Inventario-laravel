<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\solicitudRespuesta;
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

    public function rechazoSolicitud(Request $request){
        $respuesta = solicitudRespuesta::create([
            'solicitud_id' => $request->solicitud,
            'producto_id' => $request->producto,
            'ct_id' => $request->centro,
            'estatus' => "Rechazada"
        ]);

        $solicitud = Solicitud::find($request->solicitud);
        $solicitud->estatus_solicitud = "Rechazada";
        $solicitud->save();
       
        return redirect()->back();

    }

    public function update(Request $request, $id)
{
    // Encontrar la solicitud
    $solicitud = Solicitud::findOrFail($id);

    // Determinar la acción (autorizar o rechazar)
    if ($request->estatus == 'autorizar') {
        $estatus = 'Autorizada';
    } elseif ($request->estatus == 'rechazar') {
        $estatus = 'Rechazada';
    }

    // Actualizar el estatus en la tabla principal
    $solicitud->estatus = $estatus;
    $solicitud->save();

    // Guardar el detalle en la tabla de detalles de la solicitud
    solicitudRespuesta::create([
        'solicitud_id' => $solicitud->id,
        'producto_id' => $request->producto,
        'estatus' => $estatus,
        'cantidad' => $request->cantidad,  // Por si se quiere agregar comentarios
        'ct_id' => $request->centro
    ]);

    // Redirigir o enviar una respuesta
    return redirect()->back();
}

}

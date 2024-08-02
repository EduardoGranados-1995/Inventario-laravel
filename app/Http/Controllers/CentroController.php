<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentrosTrabajo; // Importa el modelo correspondiente

class CentroController extends Controller
{
    public function guardar(Request $request)
    {
        // Crear el nuevo registro en la base de datos
        CentrosTrabajo::create([
            'clave_ct' => $request->clave,
            'nombre_ct' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        // Redireccionar o responder
        return redirect()->back();
    }

    public function update(){
        
    }

}

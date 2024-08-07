<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArticulosExport;

use App\Articulo;

class ArticuloController extends Controller
{
    public function agregarArticulo(Request $request){
        return view('articulo.agregarArticulo');
    }    

    public function guardarArticulo(Request $request){
        //validar formulario
        $validatedData=$this->validate($request,[
            'categoria'=>'required',
            'producto'=>'required',
            'proveedor'=>'required',
            'fecha'=>'required',
            'Pcompra'=>'numeric|required',
            'Pventa'=>'numeric|required',
            'cantidad'=>'numeric|required',
            'descripcion'=>'required',
        ]);

        $articulo= new Articulo();
        $user=\Auth::user();
        $articulo->user_id=$user->id;
        //$articulo->inventario_id=$inventario->id;
        $articulo->categoria=$request->input('categoria');
        $articulo->producto=$request->input('producto');
        $articulo->proveedor=$request->input('proveedor');
        $articulo->fecha_ingreso=$request->input('fecha');
        $articulo->Pcompra=$request->input('Pcompra');
        $articulo->Pventa=$request->input('Pventa');
        $articulo->cantidad=$request->input('cantidad');
        $articulo->descripcion=$request->input('descripcion');

        $articulo->save();

        return redirect()->back()->with(array(
            "message"=>'Articulo agregado correctamente'
        ));



    }

    public function getImagen($filename){
        $file=Storage::disk('imagenes')->get($filename);
        return new Response($file,200);
    }

    public function getArticuloDetalle($articulo_id){
        $articulo=Articulo::find($articulo_id);
        return view('articulo.detallesArticulo', array(
            'articulo'=>$articulo
        ));
    }

    public function eliminarArticulo($articulo_id){
        Articulo::destroy($articulo_id);
        $message=array('message'=>'Articulo eliminado');
        return redirect()->route('inicioArticulos')->with($message);
    }

    public function editarArticulo($articulo_id){
        $user=\Auth::user();
        $articulo=Articulo::findOrFail($articulo_id);
        return view('articulo.editarArticulo', array('articulo'=>$articulo));
    }

    public function actualizarArticulo($articulo_id,Request $request){
        
        $validatedData=$this->validate($request,[
            'nombre'=>'required',
            'categoria'=>'required',
            'descripcion'=>'required',
            'cantidad'=>'Integer|required',
            'tipo'=>'required',
            'stock_max'=>'numeric|required',
            'stock_min'=>'numeric|required',
            'p_venta'=>'numeric|required',
            'costo'=>'numeric|required',
            'imagen'=>'required'
        ]);
        $user=\Auth::user();
        $articulo=Articulo::findOrFail($articulo_id);
        
        $articulo->user_id=$user->id;
        $articulo->nombre=$request->input('nombre');
        $articulo->categoria=$request->input('categoria');
        $articulo->descripcion=$request->input('descripcion');
        $articulo->cantidad=$request->input('cantidad');
        $articulo->tipo=$request->input('tipo');
        $articulo->stock_max=$request->input('stock_max');
        $articulo->stock_min=$request->input('stock_min');
        $articulo->p_venta=$request->input('p_venta');
        $articulo->costo=$request->input('costo');
        $imagen=$request->file('imagen');

        if ($imagen) {
            $imagen_path=$imagen->getClientOriginalName();
            \Storage::disk('imagenes')->put($imagen_path,\File::get($imagen));
            $articulo->imagen=$imagen_path;
        }


        $articulo->update();
        return redirect()->route('inicioArticulos')->with(array(
            "message"=>'Articulo actualizado correctamente'
        ));


    }

    public function buscarArticulo($buscar=null,$filtro=null){
        if (is_null($buscar)) {
            $buscar=\Request::get('buscar');
            return redirect()->route('buscarArticulo', array('buscar'=>$buscar));
        }

        if (is_null($filtro) && \Request::get('filtro') && !is_null($buscar)) {
            $filtro=\Request::get('filtro');

            return redirect()->route('buscarArticulo', array('buscar'=>$buscar, 'filtro'=>$filtro));
        }

        $column='id';
        $order='desc';
        if (!is_null($filtro)) {
            if ($filtro=='nuevo') {
                $column='id';
                $order='desc';
            }
            if ($filtro=='viejo') {
                $column='id';
                $order='asc';
            }
        }

        $articulo=Articulo::where('nombre','LIKE','%'.$buscar.'%')->orderBy($column, $order)->paginate(5);

        return view('articulo.buscarArticulo',array(
            'articulos'=>$articulo,
            'buscar'=>$buscar 
        ));
    }

/*
    public function exportarExcel(){
        return Excel::download(new ArticulosExport,'articulos-list.xlsx');
    }

*/
    public function exportarExcel(Request $request)
    {
        $articulo= new Articulo();
        $user=\Auth::user();
        $articulo->user_id=$user->id;

        return Excel::download(new ArticulosExport($request->user_id=$user->id), 'MttRegistrations.xlsx');

        //$articulo->user_id=$user->id;
    }



}
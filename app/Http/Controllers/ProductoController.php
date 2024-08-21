<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use DB;

class ProductoController extends Controller
{
    public function index(){
        $categoria = DB::table('categorias')->select('*')->get();

        $producto = DB::table('productos as p')
        ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
        ->select('p.*', 'c.nombre as nombre_cat')
        ->get();

        return view('Producto.producto', compact('categoria', 'producto'));
    }

    public function guardarCategoria(Request $request)
    {
        // Crear el nuevo registro en la base de datos
        Categoria::create([
            'nombre' => $request->nombre,
        ]);

        // Redireccionar o responder
        return redirect()->back();
    }

    public function guardarProducto(Request $request){
        Producto::create([
            'categoria_id' => $request->producto,
            'nombre_producto' => $request->nombre,
            'detalles' => $request->detalles,
        ]);

        return redirect()->back();
    }

    public function editarCategoria(Request $request, $id){
        $categoria = Categoria::findOrFail($id);

        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->back();
    }
}

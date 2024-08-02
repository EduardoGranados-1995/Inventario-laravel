<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Proveedor;
use App\Inventario;
use App\CentrosTrabajo;
use App\Producto;
use App\Categoria;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        $Centros = DB::table('centros_trabajo')->select('*')->orderBy('clave_ct', 'ASC')->get();
        $conteo = CentrosTrabajo::count();
        $conteoP = Producto::count();
        $conteoPv = Proveedor::count();
        $conteoC = Categoria::count();

        return view('home',compact('Centros','conteo', 'conteoP', 'conteoPv', 'conteoC'));
    }

    public function seleccionArticulos()
    {
        $articulos=Articulo::orderBy('id','desc')->paginate(5);
        return view('inicioArticulos', array(
            'articulos'=>$articulos
        ));
    }

    public function seleccionProveedores()
    {
        $proveedores=Proveedor::orderBy('id','desc')->paginate(5);
        return view('inicioProveedores', array(
            'proveedores'=>$proveedores
        ));
    }
    
    /*
    public function seleccionInventarios()
    {
        $inventarios=Inventario::orderBy('id','desc')->paginate(5);
        return view('inicioInventarios', array(
            'inventarios'=>$inventarios
        ));
    }
    */

    public function soporte(){
        return view('soporte');
    }

    public function perfil(){
        return view('perfil');
    }


}

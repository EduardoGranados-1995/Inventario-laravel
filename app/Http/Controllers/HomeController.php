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
        $conteo = CentrosTrabajo::count();
        $conteoP = Producto::count();
        $conteoPv = Proveedor::count();
        $conteoC = Categoria::count();
        $conteoA = Articulo::sum('cantidad');
        $conteoIn = Articulo::count();

        return view('inicio',compact('conteo', 'conteoP', 'conteoPv', 'conteoC', 'conteoA', 'conteoIn'));
    }

    public function seleccionProveedores()
    {
        $proveedores=Proveedor::orderBy('id','desc')->paginate(5);
        return view('Proveedores.inicioProveedores', array(
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

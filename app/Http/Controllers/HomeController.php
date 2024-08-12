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

    public function seleccionArticulos()
    {   $articulos = DB::table('articulos as a')
        ->join('users as u', 'a.user_id', '=', 'u.id')
        ->join('categorias as c', 'a.categoria_id', '=', 'c.id')
        ->join('productos as p', 'a.producto_id', '=', 'p.id')
        ->join('proveedores as pro', 'a.proveedor_id', '=', 'pro.id')
        ->select('a.*', 'u.name','c.id as id_cat', 'c.nombre as n_categoria','p.id as id_prod', 'p.nombre_producto', 'pro.id as id_pro', 'pro.nom_empresa')
        ->orderBy('id','desc')->get();

        $categorias = Categoria::all();
        $productos = Producto::all();
        $proveedores = Proveedor::all();

        
        return view('inventario.inicioArticulos', array(
            'articulos'=>$articulos,
            'categorias' => $categorias,
            'productos' => $productos,
            'proveedores' => $proveedores
        ));
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

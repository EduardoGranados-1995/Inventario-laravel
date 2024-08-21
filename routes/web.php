<?php

use Illuminate\Support\Facades\Route;
use App\Articulo;
use App\Exports\UsersExport;
use App\Exports\ArticuloExport;
use Maatwebsite\Excel\Facades\Excel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {return view('index');});
Auth::routes();

//RUTAS INTERNAS DE ADMINISTRACION
Route::get('/home', array('as'=>'home','middleware'=>'auth','uses'=>'HomeController@index'));
Route::get('/dashboard', array('as'=>'dashboard','middleware'=>'auth','uses'=>'CentroController@inicio'));
Route::post('/home-centro', 'CentroController@guardar')->name('centro');
Route::put('update/{id}', 'CentroController@updateCentro')->name('updateCentro');
Route::get('delete/{id}', 'CentroController@deleteCentro')->name('deleteCentro');

// Articulos
Route::get('/inicioArticulos',array('as'=>'inicioArticulos','middleware'=>'auth','uses'=>'ArticuloController@seleccionArticulos'));
Route::get('/inicioProveedores',array('as'=>'inicioProveedores','middleware'=>'auth','uses'=>'HomeController@seleccionProveedores'));
Auth::routes();
Route::get('/perfil', 'HomeController@perfil')->name('perfil');


//SECCIONES DE LA PAGINA
Route::get('/index', function(){return view('index');});
Route::get('/producto',array('as'=>'producto','middleware'=>'auth','uses'=>'ProductoController@index') );
Route::post('/producto-categoria', 'ProductoController@guardarCategoria')->name('categoria');
Route::post('/producto-producto', 'ProductoController@guardarProducto')->name('producto');
Route::put('/editar-categoria/{id}', 'ProductoController@editarCategoria')->name('editar.categoria');


//RUTAS PARA LOS ARTICULOS
Route::get('agregarArticulo/',array('as'=>'agregarArticulo','middleware'=>'auth','uses'=>'ArticuloController@agregarArticulo'));
Route::post('/guardarArticulo',array('as'=>'guardarArticulo','middleware'=>'auth','uses'=>'ArticuloController@guardarArticulo'));
Route::get('/articulo/{articulo_id}',array('as'=>'detallesArticulo','middleware'=>'auth','uses'=>'ArticuloController@getArticuloDetalle'));
Route::delete('/eliminarArticulo/{articulo_id}', array('as'=>'eliminarArticulo','middleware'=>'auth','uses'=>'ArticuloController@eliminarArticulo'));
Route::get('/editarArticulo/{articulo_id}',array('as'=>'editarArticulo', 'middleware'=>'auth','uses'=>'ArticuloController@editarArticulo'));
Route::post('/actualizarArticulo/{articulo_id}', array('as'=>'actualizarArticulo','middleware'=>'auth','uses'=>'ArticuloController@actualizarArticulo'));
Route::get('/buscarArticulo/{buscar?}/{filtro?}', array('as'=>'buscarArticulo','middleware'=>'auth','uses'=>'ArticuloController@buscarArticulo'));


//RUTAS PARA LOS PROVEEDORES
Route::get('agregarProveedor',array('as'=>'agregarProveedor','middleware'=>'auth','uses'=>'ProveedorController@agregarProveedor'));
Route::post('/guardarProveedor',array('as'=>'guardarProveedor','middleware'=>'auth','uses'=>'ProveedorController@guardarProveedor'));
Route::get('/Proveedor/{proveedor_id}',array('as'=>'detallesProveedor','middleware'=>'auth','uses'=>'ProveedorController@getProveedorDetalle'));
Route::delete('/eliminarProveedor/{proveedor_id}', array('as'=>'eliminarProveedor','middleware'=>'auth','uses'=>'ProveedorController@eliminarProveedor'));
Route::get('/editarProveedor/{proveedor_id}',array('as'=>'editarProveedor','middleware'=>'auth','uses'=>'ProveedorController@editarProveedor'));
Route::post('/actualizarProveedor/{proveedor_id}', array('as'=>'actualizarProveedor','middleware'=>'auth','uses'=>'ProveedorController@actualizarProveedor'));
Route::get('/buscarProveedor/{buscar?}', array('as'=>'buscarProveedor','middleware'=>'auth','uses'=>'ProveedorController@buscarProveedor'));

// RUTAS PARA LA FACTURACION
Route::get('/facturacion', array('as'=>'facturacion', 'middleware'=>'auth', 'uses'=>'FacturacionController@index'));
Route::post('/facturacion-create', 'FacturacionController@crearFactura')->name('crear.factura');

//EXPORTACION A EXCEL

//Route::get('articulo-list-excel','ArticuloController@exportarExcel')->name('articulos.excel');

Route::get('/exportarExcel/{user_id}',[
    'as' => 'exportarExcel',
    'uses' => 'ArticuloController@exportarExcel'
]);


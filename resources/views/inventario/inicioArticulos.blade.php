@extends('layouts.app')

@include('inventario.Modal.nuevoArticulo')

@section('content')
<!-- NUEVO DIV -->
<div class="card">
  <div class="card-header bg-info text-white" align="center">
    <h3><strong>Inventario de Productos</strong></h3>
  </div>

  
    <div class="card-body">
        <div class="content" align="center">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#articulo">
                <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Agregar Nuevo Artículo
            </button>
        </div>
  <br>
  <div class="container col-6" align="center">
      @if(session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif
  </div>
        <table class="table table-striped" id="tb-articulo">
            <thead  class="bg-secondary text-white" align="center">
                <tr>
                    <th colspan="9"><h3>Listado de Productos</h3></th>
                </tr>
                <tr>
                    <th>Categoría</th>
                    <th>Producto</th>
                    <th>Proveedor</th>
                    <th>Fecha de Ingreso</th>
                    <th>Cantidad</th>
                    <th>Precio de Compra</th>
                    <th>Precio de Venta</th>
                    <th>Ingresado Por</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody align="center">
                @if(count($articulos) >= 1)
                @foreach($articulos as $articulo)
                    <tr>
                            <th>{{$articulo->n_categoria}}</th>
                            <th>{{$articulo->nombre_producto}}</th>
                            <th>{{$articulo->nom_empresa}}</th>
                            <th>{{ Carbon\Carbon::parse($articulo->fecha_ingreso)->format('d-m-Y') }}</th>
                            <th>{{$articulo->cantidad}}</th>
                            <th>$ {{$articulo->Pcompra}}</th>
                            <th>$ {{$articulo->Pventa}}</th>
                            <th>{{$articulo->name}}</th>
                            <th>
                                <!-- <a href="{{ route('detallesArticulo',['articulo_id' => $articulo->id ] )}}" class="btn btn-success btn-sm" style="margin:5px"><i class="fa fa-eye" aria-hidden="true">&nbsp;Ver</i></a>
                                <br> -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actArticulo{{$articulo->id}}">
                                    <i class="fa fa-pencil-square" aria-hidden="true">&nbsp;Editar</i>
                                </button>
                                <!-- <a href="{{ route('editarArticulo',['articulo_id' => $articulo->id ] )}}" class="btn btn-primary btn-sm" style="margin:5px"><i class="fa fa-pencil-square" aria-hidden="true">&nbsp;Editar</i></a> -->
                                <br>

                                <form action="{{url('/eliminarArticulo/'.$articulo->id)}}" method="post" style="margin:5px">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                <!-- Botón en HTML (lanza el modal en Bootstrap)--> 
                                    <a href="#modal{{$articulo->id}}" role="button" class="btn btn-danger btn-sm"data-toggle="modal"><i class="fa fa-window-close-o" aria-hidden="true">&nbsp;Eliminar</i></a>
                                    <!-- Modal / Ventana / Overlay en HTML  -->

                                    <div id="modal{{$articulo->id}}" class="modal fade" >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">¿Estás seguro?</h3>
                                                    {{--'&times;' ES UNA 'X' PARA CERRAR EN BOOTSTRAP--}}
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>¿Seguro que quieres borrar este articulo?</h3>
                                                <h5>Producto: {{$articulo->nombre_producto}}</h5>
                                                <h5>Categoria: {{$articulo->n_categoria}}</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Aceptar</button>  
                                                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </th>
                        </tr>
                        @include('inventario.Modal.actualizarArticulo')
                    @endforeach   
                @else
                        <th class="alert-danger" colspan="9"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;No hay articulos, agregue alguno</th><br>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script src="{{ asset(url('js/Inventario/inventario.js')) }}"></script>
@endsection

@extends('layouts.app')

@include('inventario.Modal.nuevoArticulo')

@section('content')
    <div class="card-header bg-info text-white" align="center">
      <h3><strong>Inventario</strong></h3>
    </div>
    <br>
    <div class="container" >
        <div class="row">
            <div class="col-4">
                <br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#articulo">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>Agregar Nuevo Artículo
                </button>
            </div>
            <div class="col-4" align="center">
                <form action="{{url('/buscarArticulo')}}" role="buscar" method="get" class="col-md-10"> 
                    <label for="buscar"><h5>Buscar por Producto</h5></label>
                    <input type="text" class="form-control" name="buscar"> <br>
                    <input type="submit" value="buscar" class="btn btn-info">
                </form>
            </div>
            <div class="col4">
                <a href="{{url('/home')}}"  class="btn btn-danger" style="margin:33px 0px 0px 50px">Regresar</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        
    </div>
    @include('inventario.listaArticulo')
    <br>
    <hr>
@endsection

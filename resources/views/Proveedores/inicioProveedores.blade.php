@extends('layouts.app')

@section('content')
@include('Proveedores.Modal.agregarProveedor')

<div class="container" >
    <div class="row">
        <div class="col-4">
            <!-- <a href="{{url('/agregarProveedor')}}" class="btn btn-success" ><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar proveedor </a> -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar proveedor
            </button>

        </div>
        <div class="col-6">
            <!-- <form action="{{url('/buscarProveedor')}}" role="buscar" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form> -->
        </div>
        <div class="col-2">
            <a href="{{url('/home')}}" class="btn btn-danger"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</a>
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

    @include('proveedor.listaProveedor')
    
    <br>
    <div class="fa-pull-right" >
        {{$proveedores->links()}}
    </div>
    <hr>
@endsection

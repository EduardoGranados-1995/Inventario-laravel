
@extends('layouts.app')

@section('styles')
<style>

</style>
@endsection

@section('script')
<script>

</script>
@endsection

@include('Centro.centros')

@section('content')
<div class="card">
  <div class="card-header" align="center">
    <h3><strong>Todos los Centros de Trabajo</strong></h3>
  </div>
  <div class="card-body">
    
    <h5 class="card-title"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Centros">
        Nuevo Centro de Trabajo
    </button></h5>
    <table class="table">
                <thead  class="thead-primary" align="center">
                    <th>Clave Centro</th>
                    <th>Nombre Centro</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody align="center">
                    @if(count($Centros) > 0)
                        @foreach($Centros as $cen)
                        <tr>
                            <th>{{$cen->clave_ct}}</th>
                            <td>{{$cen->nombre_ct}}</td>
                            <td>{{$cen->telefono}}</td>
                            <td>{{$cen->direccion}}</td>
                            <td>
                                <a href="#" class="btn btn-info">Editar</a>
                            </td>
                            <td>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <td colspan="6">
                            <div class="alert-danger">No existe ningun centro de trabajo.</div>
                        </td>
                    @endif
                </tbody>
            </table>
  </div>
</div>

<!-- 
<center>
    <h2>Panel de inicio</h2>
    <br>
    <div class="contenedor">
    <div class="row">
        <div class="col-sm">
            <img src="{{asset('img/inventario2.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
        <a href="{{url('/inicioArticulos')}}" class="btn btn-info">Ver inventario</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/proveedores.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 290px; height: 190px;">
            <br>
            <a href="{{route('inicioProveedores')}}" class="btn btn-info">Ver proveedores</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/perfil.png')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
            <a href="{{url('/perfil')}}" class="btn btn-info">Ver mi perfil</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/soporte.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
            <a href="{{url('/soporte')}}" class="btn btn-info">Contacta soporte tecnico</a> 
        </div>
    </div>
    </div>
</center> -->

<br>
@endsection

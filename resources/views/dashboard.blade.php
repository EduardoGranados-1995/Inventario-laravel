@extends('layouts.app')

@include('Centro.centros')

@section('content')
<div class="card-header bg-info text-white" align="center">
  <h3><strong>Todos los Centros de Trabajo</strong></h3>
  <h5 class="card-title" align="right">
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Centros">
      <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nuevo Centro de Trabajo
      </button>
  </h5>
</div>
<br>
@include('Mensajes.msg')

<div class="container col-10" align="center">
    <label for="texto">* El centro de trabajo se debe buscar por medio del <strong>"NOMBRE"</strong></label>
    <div class="input-group col-5 mb-3">
        <input type="text" id="texto" name="texto"class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
        <button class="btn btn-outline-success" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>

    <table id="myTable" class="table table-striped" align="center">
        <thead  class="bg-secondary text-white" align="center">
            <tr>
                <th>Clave Centro</th>
                <th>Nombre Centro</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
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
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editCentro{{ $cen->id }}" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <a href="{{route('deleteCentro', $cen->id)}}"class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <!-- MODAL EDITAR -->
                    @include('Centro.Modal.editarCentro')
                @endforeach
            @else
                <td colspan="6">
                    <div class="alert-danger">No existe ningun centro de trabajo.</div>
                </td>
            @endif
        </tbody>
    </table>
</div>



<script src="{{asset(url('js/Centros/centros.js'))}}"></script>
@endsection
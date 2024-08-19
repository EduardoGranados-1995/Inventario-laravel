
@extends('layouts.app')



@include('Centro.centros')


@section('content')
<div class="card">
  <div class="card-header bg-info text-white" align="center">
    <h3><strong>Todos los Centros de Trabajo</strong></h3>
  </div>

  <br>
  
    <div class="card-body" align="center">
        <h5 class="card-title" align="right">
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Centros">
            <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nuevo Centro de Trabajo
            </button>
        </h5>

        @include('Mensajes.msg')

        <table class="table table-striped col-md-10" >
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
        <!-- Enlaces de paginación -->
        <div class="pagination" align="right">
            {{ $Centros->links() }}
        </div>
    </div>    
</div>
@endsection
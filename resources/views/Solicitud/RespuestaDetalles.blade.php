@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header text-white" bg-color="#248801" align="center" >
    <h2>Detalles de la Solicitud</h2>
  </div>

  <div align="right">
    <a href="{{ url('/solicitud-respuesta')}}" class="btn btn-warning m-4"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;Regresar</a>
  </div>


    <table class="table table-bordered">
      <thead class="text-center">
        <tr>
          <th colspan="2">Listado de Solicitudes Recibidas</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <strong>Nombre del Solicitante: </strong>{{ $solicitud->nombre }}
          </td>
          <td>
            <strong>Centro de Trabajo: </strong>{{ $solicitud->ct_id }}
          </td>
        </tr>
        <tr>
          <td>
            <strong>Producto Solicitado: </strong>{{ $solicitud->producto_id }}
          </td>
          <td>
            <strong>Cantidad Solicitada: </strong>{{ $solicitud->cantidad }}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <strong>Descripcion: </strong>{{ $solicitud->descripcion }}
          </td>
        </tr>
        <tr class="text-right">
      </tbody>
    </table> 
</div>
@endsection
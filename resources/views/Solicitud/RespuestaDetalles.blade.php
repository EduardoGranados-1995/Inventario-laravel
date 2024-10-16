@extends('layouts.app')

@include('Solicitud.Modal.SolicitudRechazada')
@section('content')
<div class="card">
  <div class="card-header text-white" bg-color="#248801" align="center" >
    <h2>Detalles de la Solicitud</h2>
  </div>
  <br>
  <div class="row">
    <div class="col-7 text-right">
      <p><strong>Nota: </strong>En esta sección se deberá revisar la información de la solicitud recibida, para de esa forma validar o rechazar la misma.</p>
    </div>
    <div class="col-5 text-right" >
      <a href="{{ route('respuesta.solicitud') }}" class="btn btn-warning"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;Regresar</a> &nbsp;
    </div>
  </div>
  <br>
    @foreach($solicitud as $soli)  
      <div class="container">
        <div class="row">
          <div class="border border-dark col-12 bg-secondary text-white text-center">
            <h2>Detalles para la Solicitud Número {{ $soli->id }}</h2>
          </div>
        </div>
        <h5>
          <div class="row">
            <div class="border border-dark col-6">
              <strong>Solicitante: </strong>{{ $soli->nombre }}
            </div>
            <div class="border border-dark col-6 text-justify">
              <strong>Descripción: </strong>{{ $soli->descripcion }}
            </div>
          </div>
          <div class="row">
            <div class="border border-dark col-3">
              <strong>Producto: </strong>
            </div>
            <div class="border border-dark col-3">
              {{ $soli->clave_producto }} | {{ $soli->nombre_producto }}
            </div>
            <div class="border border-dark col-3">
              <strong>Cantidad: </strong>
            </div>
            <div class="border border-dark col-3">
                {{ $soli->cantidad }}
            </div>
          </div>
        </h5>
        <div class="row">
          <div class="col-12" align="center">
            @if($soli->estatus_solicitud == "Rechazada")
              <p class="alert alert-danger col-3">La solicitud ha sido rechazada.</p>
            @else
              <a href="" class="btn btn-success">Autorizar</a>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#SoliRechazo">
                Rechazar
              </button>
            @endif
          </div>
        </div>
      </div>
    @endforeach 
  <br>
</div>
@endsection
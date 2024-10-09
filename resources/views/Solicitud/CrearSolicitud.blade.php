@extends('layouts.app')

@section('content')
@if (session('agregar') == 'ok')
  <script>
    Swal.fire(
        '¡Enviado!',
        'La solicitud se envió con éxito.',
        'success'
    )      
  </script>
@endif
<div class="card">
  <div class="card-header text-white" bg-color="#248801" align="center" >
    <h2>Solicitud para Almacén</h2>
  </div>

  <br>
  <form id="form-solicitud" action="{{route('guardar.solicitud')}}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="container">
      <div class="row">
        <div class="col-6">
          <label for="nombre"><strong>Nombre</strong></label>
          <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Introduzca su nombre completo">
        </div>
        <div class="col-6">
          <label for="centro"><strong>Centro de Trabajo</strong></label>
          <select name="centro" id="centro" class="form-control">
            <option value="">Seleccione un centro de trabajo</option>
            @foreach($centros as $centro)
              <option value="{{ $centro->clave_ct }}">{{ $centro->nombre_ct }}</option>
            @endforeach
          </select>  
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-6">
          <label for="producto"><strong>Producto</strong></label>
          <select name="producto" id="producto" class="form-control">
            <option value="">Selecciona el producto a solicitar</option>
            @foreach($productos as $producto)
              <option value="{{ $producto->id }}">{{$producto->clave_producto}} | {{$producto->nombre_producto}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-6">
          <label for="cantidad"><strong>Cantidad</strong></label>
          <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese la cantidad a solicitar del producto">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <label for="texto"><strong>Descripción</strong></label>
          <textarea name="texto" id="texto" class="form-control" placeholder="Introduzca la descripción para la solicitud"></textarea>
        </div>
      </div>

      <div align="right">
        <button type="submit" id="submitBtn" class="btn btn-success col-3 m-3">Enviar</button>
      </div>
    </div>

  </form>
</div>


<script>
  document.getElementById('submitBtn').addEventListener('click', function(event) {
      event.preventDefault(); // Evita que el formulario se envíe inmediatamente

      Swal.fire({
          title: '¿Estás seguro?',
          text: "No podrás modificar esta acción.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#14982a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, enviar!'
      }).then((result) => {
          if (result.isConfirmed) {
              // Si el usuario confirma, se envía el formulario
              document.getElementById('form-solicitud').submit();
          }
      });
  });
</script>
@endsection
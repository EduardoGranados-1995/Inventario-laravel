@extends('layouts.app')

@section('scripts')
<script src="script.js"></script>
@endsection

@include('Producto.Modal.nuevacategoria')
@include('Producto.Modal.nuevoproducto')

@section('content')

<div class="card">
  <div class="card-header bg-info text-white" align="center">
    <h3><strong>Categorías y Productos</strong></h3>
  </div>

  
    <div class="card-body">
        <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" class="navbar navbar-info" style="background-color: #e3f2fd;">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#categorias">Categorias</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#productos">Productos</a>
                </li>
            </ul>

        <div class="tab-content" align="right">
            <div id="categorias" class="container tab-pane active">
                <br>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#NuevaCategoria" >
                <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nueva Categoría
                </button>
                <br><br>
                    <table class="table table-striped">

                        <thead  class="bg-secondary text-white" align="center">
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody align="center">
                            @foreach($categoria as $cat)
                                <tr>
                                    <td>{{$cat->nombre}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editCategoria{{ $cat->id }}" >
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="{{ route('eliminar.categoria', $cat->id) }}" class="formulario-eliminar">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @include('Producto.Modal.editCategoria')
                            @endforeach
                        </tbody>
                    </table>
            </div>

            <div id="productos" class="container tab-pane fade">
                <br>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#NuevoProducto">
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nuevo Producto
                </button>
                <br><br>
                <table class="table table-striped">
                    <thead  class="bg-secondary text-white" align="center">
                        <th>Categoría</th>
                        <th>Nombre del Producto</th>
                        <th>Detalles</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody align="center">
                        @foreach($producto as $pro)
                            <tr>
                                <td>{{$pro->nombre_cat}}</td>
                                <td>{{$pro->nombre_producto}}</td>
                                <td>{{$pro->detalles}}</td>

                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editProducto{{ $pro->id }}" >
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <form action="{{ route('eliminar.producto', $pro->id) }}" class="formulario-eliminar">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @include('Producto.Modal.editProducto')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $('.formulario-eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
        title: '¿Estas Seguro?',
        text: "¡No podrás modificarlo después!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: '¡Si, Eliminar!'
      }).then((result) => {
        if (result.value) {
            this.submit()
          }
    })
  });
</script>
@endsection
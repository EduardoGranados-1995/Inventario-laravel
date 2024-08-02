@extends('layouts.app')

@section('scripts')
<script src="script.js"></script>
@endsection

@include('Producto.Modal.nuevacategoria')
@include('Producto.Modal.nuevoproducto')
@include('Producto.Modal.nuevoproveedor')

@section('content')
<div class="container">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" class="navbar navbar-light" style="background-color: #e3f2fd;">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#categorias">Categorias</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#productos">Productos</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="categorias" class="container tab-pane active">
            <br>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NuevaCategoria">
                Nueva Categoría
            </button>
            <br><br>
            <table class="table">
                <thead  class="thead-primary" align="center">
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody align="center">
                    @foreach($categoria as $cat)
                        <tr>
                            <td>{{$cat->nombre}}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="productos" class="container tab-pane fade">
            <br>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NuevoProducto">
                Nuevo Producto
            </button>
            <br><br>
            <table class="table">
                <thead  class="thead-primary" align="center">
                    <th>Categoría</th>
                    <th>Nombre del Producto</th>
                    <th>Detalles</th>
                </thead>
                <tbody align="center">
                    @foreach($producto as $pro)
                        <tr>
                            <td>{{$pro->nombre_cat}}</td>
                            <td>{{$pro->nombre_producto}}</td>
                            <td>{{$pro->detalles}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
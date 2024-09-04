@extends('layouts.app')

@include('inventario.Modal.nuevoArticulo')

@section('content')
    <div class="card-header bg-info text-white" align="center">
      <h3><strong>Inventario</strong></h3>
    </div>
    <br>
    <div class="container" >
        <div class="row">
            <div class="col-8" align="center">
                <form action="{{url('/buscarArticulo')}}" role="buscar" method="get" class="col-md-10"> 
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="buscar" placeholder="Buscar Producto" required> <br>
                        <div class="input-group-append">
                            <input type="submit" value="buscar" class="btn btn-info">
                        </div>
                    </div>              
                </form>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#articulo">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Agregar Nuevo Artículo
                </button>
            </div>
            <!-- <div class="col-4">
                <a href="{{url('/home')}}"  class="btn btn-danger" style="margin:33px 0px 0px 50px">Regresar</a>
            </div> -->
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


<script>
document.getElementById('category-select').addEventListener('change', function() {
    var categoryId = this.value;
    
    // Limpiar el select de productos
    var productSelect = document.getElementById('product-select');
    productSelect.innerHTML = '<option value="">Seleccione un producto</option>';
    
    if (categoryId) {
        // Hacer la solicitud AJAX para obtener los productos
        fetch(`/get-products-by-category-inv/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(function(product) {
                    var option = document.createElement('option');
                    option.value = product.id;
                    option.text = product.nombre_producto;
                    productSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    }
});

</script>
@endsection

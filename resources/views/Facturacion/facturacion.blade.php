@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white" align="center" >
        <h2>Facturación</h2>
    </div>
    <div class="card-body" align="right">
            <button id="toggleButton" class="btn btn-success">Nueva Factura</button>
    <!-- AQUI COMIENZA FORMULARIO PARA AGREGAR FACTURA -->
        <div id="myCard" class="card" style="display: none;">
            <div class="card-body">
                <div class="card" align="center">
                    <div class="card-body">
                        <form action="" method="POST">
                        @csrf
                            <div class="row col-6">
                                <div class="input-group mb-3 col-6">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-outdent" aria-hidden="true"></i></button>
                                    </div>
                                    <select id="centro" name="centro" class="form-control" aria-label="Default select example">
                                        <option selected>Selecciona un Centro de Trabajo</option>
                                        @foreach($centros as $cent)
                                        <option value="{{ $cent->clave_ct }}">{{ $cent->clave_ct }} | {{ $cent->nombre_ct }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3 col-6">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                    </div>
                                    <input type="date" id="fecha" name="fecha" placeholder="Selecciona la fecha para la factura">
                                </div>
                            </div>

                            <table class="table table-bordered" id="tablaFacturas">
                                <thead class="bg-info">
                                    <th class="col-3">Categoría</th>
                                    <th class="col-3">Producto</th>
                                    <th class="col-2">Precio</th>
                                    <th class="col-2">Cantidad</th>
                                    <th class="col-2">Total</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody align="center">
                                    <tr>
                                        <td>
                                            <select name="categoria[]" id="categoria" class="form-control">
                                                <option value="">Selecciona una Categoría</option>
                                                @foreach($categoria as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="producto[]" id="producto" class="form-control">
                                                <option value="">Selecciona un Producto</option>
                                                @foreach($producto as $prod)
                                                <option value="{{ $prod->id }}">{{ $prod->nombre_producto }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" id="" name="precio[]" class="form-control"></td>
                                        <td><input type="text" id="" name="cantidad[]" class="form-control"></td>
                                        <td><input type="number" id="total" name="total[]" step="0.01" class="form-control"></td>
                                        <td><button type="button" class="btn btn-danger btn-sm eliminarFila"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <button type="button" id="agregarProducto" class="btn btn-primary ">Agregar Producto</button>
                            <button type="submit" class="btn btn-success col-2">Crear Factura</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- ACA TERMINA FORMULARIO-->
        
        <br><br>
        <table class="table table-bordered">
            <thead class="table-secondary" align="center">
                <tr><th colspan="6"><h3>Listado de Facturas Emitidas</h3></th></tr>
                <tr>
                    <th>N° Factura</th>
                    <th>Categoría</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @if($facturas > 1)
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            @else
                <tr align="center">
                    <td colspan="6" class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;No existe ninguna factura</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>


<script>
    document.getElementById('toggleButton').addEventListener('click', function() {
        var card = document.getElementById('myCard');
        if (card.style.display === 'none') {
            card.style.display = 'block';
            this.textContent = 'Cancelar';
        } else {
            card.style.display = 'none';
            this.textContent = 'Nueva Factura';
        }
    });
</script>

<script>
$(document).ready(function() {
    $("#agregarProducto").click(function() {
        var nuevaFila = `<tr>
                            <td>
                                <select name="categoria[]" id="categoria" class="form-control">
                                    <option value="">Selecciona una Categoría</option>
                                    @foreach($categoria as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->nombre }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="producto[]" id="producto" class="form-control">
                                    <option value="">Selecciona un Producto</option>
                                    @foreach($producto as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->nombre_producto }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" id="" name="precio[]" class="form-control"></td>
                            <td><input type="text" id="" name="cantidad[]" class="form-control"></td>
                            <td><input type="number" id="total" name="total[]" step="0.01" class="form-control"></td>
                            <td><button type="button" class="btn btn-danger btn-sm eliminarFila"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                        </tr>`;
        $("#tablaFacturas tbody").append(nuevaFila);
    });
});

// Manejar el evento de eliminación
$(document).on("click", ".eliminarFila", function() {
    $(this).closest("tr").remove();
});
</script>
@endsection
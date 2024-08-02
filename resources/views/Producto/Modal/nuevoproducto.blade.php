<!-- Modal -->
<div class="modal fade" id="NuevoProducto" tabindex="-1" role="dialog" aria-labelledby="NuevoProductoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NuevoProductoLabel">Nuevo Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="centroT" method="POST" action="{{ route('producto') }}">
        @csrf
          <label for="producto">Categoría:</label>
          <select name="producto" id="producto" class="form-control">
            <option value="">Selecciona una categoría</option>
            @foreach($categoria as $cat)
              <option value="{{$cat->id}}">{{$cat->nombre}}</option>
            @endforeach
          </select>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" class="form-control">
          <label for="detalles">Detalles:</label>
          <input type="text" id="detalles" name="detalles" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
        </div>
        </form>
    </div>
  </div>
</div>
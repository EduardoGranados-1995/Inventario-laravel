<!-- Modal -->
<div class="modal fade" id="Centros" tabindex="-1" role="dialog" aria-labelledby="CentrosLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CentrosLabel">Nuevo Centro de Trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="centroT" method="POST" action="{{ route('centro') }}">
          @csrf
          <label for="clave">Clave del Centro de Trabajo:</label>
          <input type="text" id="clave" name="clave" class="form-control" required>
          <label for="nombre">Nombre del Centro de Trabajo:</label>
          <input type="text" id="nombre" name="nombre" class="form-control" required>
          <label for="telefono">Teléfono:</label>
          <input type="text" id="telefono" name="telefono" class="form-control" required>
          <label for="direccion">Dirección:</label>
          <input type="text" id="direccion" name="direccion" class="form-control" required>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
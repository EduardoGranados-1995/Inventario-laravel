<!-- Modal -->
<div class="modal fade" id="NuevaCategoria" tabindex="-1" role="dialog" aria-labelledby="NuevaCategoriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="NuevaCategoriaLabel">Nueva Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="centroT" method="POST" action="{{ route('categoria') }}">
            @csrf
            <label for="nombre">Nombre Categoría:</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Guardar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
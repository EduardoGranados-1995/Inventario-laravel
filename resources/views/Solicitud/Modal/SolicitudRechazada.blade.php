<!-- Modal -->
<div class="modal fade" id="SoliRechazo" tabindex="-1" role="dialog" aria-labelledby="SoliRechazoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    @foreach($solicitud as $soli)    
      <div class="modal-header">
        <h5 class="modal-title" id="SoliRechazoLabel">Rechazar solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="solicitud-rechazo" action="{{route('rechazo.solicitud')}}" method="POST" enctype='multipart/form-data'>
            <table class="table table-striped">
                <tr>
                    <td>Número de Solicitud</td>
                    <td><input type="text" name="solicitud" id="solicitud" class="form-control" value="{{ $soli->id }}" readonly></td>
                </tr>
                <tr>
                    <td>Producto</td>
                    <input type="hidden" name="producto" id="producto" value="{{ $soli->producto_id }}">
                    <td><input type="text" name="producto_nombre" id="producto_nombre" class="form-control" value="{{ $soli->nombre_producto }}" readonly></td>
                </tr>
                <tr>
                    <td>Centro de Trabajo</td>
                    <td><input type="text" name="centro" id="centro" class="form-control" value="{{ $soli->ct_id}}" readonly></td>
                </tr>

            </table>
        <form>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Sí, Rechazar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    @endforeach
    </div>
  </div>
</div>
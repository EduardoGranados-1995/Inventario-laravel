<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="{{url('/guardarProveedor')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="input-group mb-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" id="nom_empresa" name="nom_empresa" placeholder="Nombre del Proveedor" class="form-control" value="{{old('nom_empresa')}}" required>
                </div>
                <br>
                <div class="input-group mb-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" id="descripcion" name="descripcion" placeholder="Correo Electrónico" class="form-control" value="{{old('descripcion')}}" required>
                </div>
                <br>
                <div class="input-group mb-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" id="rubro" name="rubro" placeholder="Dirección" class="form-control" value="{{old('rubro')}}" required>
                </div>
                <br>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Agregar">
                    <a href="{{url('/inicioProveedores')}}"  class="btn btn-danger" >Cancelar</a>
                </div>
                </div>
            </div>

            </form>
        </div>
    </div>
  </div>
</div>
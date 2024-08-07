<!-- Modal -->
<div class="modal fade" id="articulo" tabindex="-1" role="dialog" aria-labelledby="articuloLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="articuloLabel">Nuevo Artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/guardarArticulo')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-outdent" aria-hidden="true"></i></button>
                    </div>
                    <select id="categoria" name="categoria" class="form-control" aria-label="Default select example">
                        <option selected>Selecciona una Categoria</option>
                        <option value="4">Inmobiliario</option>
                        <option value="7">Tecnología y Electrónica</option>
                        <option value="5">Productos de Papelería</option>
                    </select>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-archive" aria-hidden="true"></i></button>
                    </div>
                    <select id="producto" name="producto" class="form-control" aria-label="Default select example">
                        <option selected>Selecciona un Producto</option>
                        <option value="1">Silla de Escritorio</option>
                        <option value="3">Ciento de Hojas Blancas</option>
                        <option value="2">Pantalla de PC</option>
                    </select>
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success btn-sm" type="button"><i class="fa fa-users" aria-hidden="true"></i></button>
                    </div>
                    <select id="proveedor" name="proveedor" class="form-control" aria-label="Default select example">
                        <option selected>Selecciona un Proveedor</option>
                        <option value="451">Dirección de Servicios Informáticos</option>
                        <option value="100">Dirección General</option>
                        <option value="255">Compañía Nacional de Teatro</option>
                    </select>
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-warning btn-sm" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                    </div>
                    <input id="fecha" name="fecha" type="date" class="form-control" placeholder="Fecha de Ingreso" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-danger btn-sm" type="button"><i class="fa fa-dollar" aria-hidden="true"></i></button>
                    </div>
                    <input id="Pcompra" name="Pcompra" type="text" class="form-control" placeholder="Precio de Compra" aria-label="" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-dollar" aria-hidden="true"></i></button>
                    </div>
                    <input id="Pventa" name="Pventa" type="text" class="form-control" placeholder="Precio de Venta" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success btn-sm" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <input id="cantidad" name="cantidad" type="text" class="form-control" placeholder="Cantidad" aria-label="" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 col-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    </div>
                    <input id="descripcion" name="descripcion" type="text" class="form-control" placeholder="Descripción" aria-label="" aria-describedby="basic-addon1">
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="col-12" align="right">
                    <input type="submit" class="btn btn-success" value="Agregar">
                    <a href="{{url('/inicioArticulos')}}"  class="btn btn-danger" >Cancelar</a>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
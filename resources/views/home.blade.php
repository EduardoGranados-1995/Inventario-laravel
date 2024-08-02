
@extends('layouts.app')

@section('styles')
<style>

</style>
@endsection

@section('script')
<script>

</script>
@endsection

@include('Centro.centros')

@section('content')
<div class="card">
  <div class="card-header bg-info text-white" align="center">
    <h3><strong>Todos los Centros de Trabajo</strong></h3>
  </div>

  <br>
  
  <div class="card-body" align="center">
      <h5 class="card-title" align="right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Centros">
        <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Nuevo Centro de Trabajo
      </button></h5>
    <table class="table table-striped col-md-10" >
                <thead  class="thead-primary" align="center">
                    <th>Clave Centro</th>
                    <th>Nombre Centro</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody align="center">
                    @if(count($Centros) > 0)
                        @foreach($Centros as $cen)
                        <tr>
                            <th>{{$cen->clave_ct}}</th>
                            <td>{{$cen->nombre_ct}}</td>
                            <td>{{$cen->telefono}}</td>
                            <td>{{$cen->direccion}}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <td colspan="6">
                            <div class="alert-danger">No existe ningun centro de trabajo.</div>
                        </td>
                    @endif
                </tbody>
            </table>
  </div>
</div>


<div class="grey-bg container-fluid" ¿>
  <section id="minimal-statistics">
    &nbsp;
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card bg-info text-white">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fa fa-building fa-5x primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                    <span>Centros de Trabajo</span>
                    <h3>{{ $conteo }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card bg-success text-white">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fa fa-users fa-5x success font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                    <span>Proveedores</span>
                    <h3>{{ $conteoPv }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card bg-primary text-white">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fa fa-outdent fa-5x danger font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                    <span>Categorías</span>
                    <h3>{{ $conteoC }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card bg-warning text-white">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fa fa-archive fa-5x warning font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                    <span>Productos</span>
                    <h3>{{ $conteoP }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <br>
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="danger">278</h3>
                  <span>New Projects</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-rocket danger font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="success">156</h3>
                  <span>New Clients</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-user success font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="warning">64.89 %</h3>
                  <span>Conversion Rate</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-pie-chart warning font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="primary">423</h3>
                  <span>Support Tickets</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-support primary font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <br>
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="primary">278</h3>
                  <span>New Posts</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-book-open primary font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="warning">156</h3>
                  <span>New Comments</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-bubbles warning font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="success">64.89 %</h3>
                  <span>Bounce Rate</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-cup success font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="danger">423</h3>
                  <span>Total Visits</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-direction danger font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
<!-- 
<center>
    <h2>Panel de inicio</h2>
    <br>
    <div class="contenedor">
    <div class="row">
        <div class="col-sm">
            <img src="{{asset('img/inventario2.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
        <a href="{{url('/inicioArticulos')}}" class="btn btn-info">Ver inventario</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/proveedores.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 290px; height: 190px;">
            <br>
            <a href="{{route('inicioProveedores')}}" class="btn btn-info">Ver proveedores</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/perfil.png')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
            <a href="{{url('/perfil')}}" class="btn btn-info">Ver mi perfil</a> 
        </div>
        <div class="col-sm">
            <img src="{{asset('img/soporte.jpg')}}" alt="" style="margin: 10px 0px 20px 0px; width: 200px; height: 190px;">
            <br>
            <a href="{{url('/soporte')}}" class="btn btn-info">Contacta soporte tecnico</a> 
        </div>
    </div>
    </div>
</center> -->

<br>
@endsection

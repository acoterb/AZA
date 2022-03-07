@extends('admin.layouts.menu')

@section('breadcrumb')
  <li class="breadcrumb-item active" aria-current="page">Personal</li>
@endsection
@section('content')
    <div class="col-md-12 text-center">
      <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
        <div class="card-header">
            <h2>RH GESTION DE PERSONAL</h2>
        </div>
        <div class="card-body">
          <h3>
            <a href="{{route('rh.create')}}" style="color:#037DB4;"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Candidatos</a>
          </h3>
          <table id="personalInfo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Numero de empleado</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>NSS</th>
                      <th>RFC</th>
                      <th>CURP</th>
                      <th>Fecha de entrada</th>
                      <th>Zona</th>
                      <th>Sucursal</th>
                      <th>Razon social</th>
                      <th>Estatus</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($usuarios as $usuario)
                  <tr>

                    {{$usuario->nombre}}
                      <td>{{$usuario->id}}</td>
                      <td>{{$usuario->name}}</td>
                      <td>{{$usuario->apellidos}}</td>
                      <td>{{$usuario->nss}}</td>
                      <td>{{$usuario->rfc}}</td>
                      <td>{{$usuario->curp}}</td>
                      <td>{{$usuario->fecha_entrada}}</td>
                      <td>{{$usuario->zonas->zona}}</td>
                      <td>{{$usuario->sucursal}}</td>
                      <td>{{$usuario->razon_social}}</td>
                      <td>ACTIVO</td>
                      <td>
                        <a href="{{route('rh.edit',$usuario->id)}}">
                          <button class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                          </button>
                        </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" value="{{route('rh.destroy',$usuario->id)}}"
                          onclick="$('#destroyconfirm').attr('action',this.value);">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                  </tr>
                     @endforeach

              </tbody>
          </table>
        </div>
      </div>
    </div>


@endsection
  @include("RH.form")

@push('js')

  <script defer src="{{asset('js/jquery/jquery.dataTables.min.js')}}" ></script>
  <script defer src="{{asset('js/jquery/dataTables.bootstrap4.min.js')}}" ></script>
  <script defer src="{{asset('js/jquery/dataTables.fixedHeader.min.js')}}" ></script>
  <script defer src="{{asset('js/jquery/dataTables.responsive.min.js')}}" ></script>
  <script defer src="{{asset('js/jquery/responsive.bootstrap.min.js')}}" ></script>

    <script type="text/javascript">

        $(document).ready(function() {
          $('#personalInfo').DataTable({
            "language": {
              "decimal": "",
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
              "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
              "infoFiltered": "(Filtrado de _MAX_ total entradas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Entradas",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscar:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
            },
          });
        } );

    </script>
@endpush

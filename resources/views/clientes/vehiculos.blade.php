@extends('admin.layouts.menu')

@section('breadcrumb')
  <li class="breadcrumb-item active" aria-current="page">Info servicos</li>
@endsection
@section('content')
    <div class="col-md-12 text-center">
      <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
        <div class="card-header">
            <h2>Informacion de vehiculos</h2>
        </div>
        <div class="card-body">
       
          <table id="personalInfo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>MARCA</th>
                      <th>SUB MARCA</th>
                      <th>TIPO</th>
                      <th>SERVICIO</th>
                      <th>COLOR</th>
                      <th>PLACAS</th>
                      <th>ESTADO</th>
                     
                  </tr>
              </thead>
              <tbody>
                  
                  <tr>

                      <td>{{$clientes->vehiculo->marca}}</td>
                      <td>{{$clientes->vehiculo->submarca}}</td>
                      <td>{{$clientes->vehiculo->tipo}}</td>
                      <td>{{$clientes->vehiculo->servicio}}</td>
                      <td>{{$clientes->vehiculo->color}}</td>
                      <td>{{$clientes->vehiculo->placas}}</td>
                      <td>{{$clientes->vehiculo->estado}}</td>
              
                      
                  </tr>
                     

              </tbody>
          </table>
        </div>
      </div>
    </div>


@endsection


@push('js')

  <script defer src="{{asset('public/js/jquery/jquery.dataTables.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.bootstrap4.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.fixedHeader.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.responsive.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/responsive.bootstrap.min.js')}}" ></script>

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

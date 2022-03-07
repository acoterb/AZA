<link href="{{asset('public/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('public/select2/dist/css/select2_bootstrap4theme.min.css')}}" rel="stylesheet" />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="col-md-12 text-center">
  <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
    <div class="card-header">
        <h2>REPORTE DE AUXILIARES</h2>
    </div>
    <div class="card-body">
      <table id="personalInfo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Nombre de Reporte</th>
                  <th>Descripcion de reporte</th>
                  <th>Generar reporte</th>
              </tr>
          </thead>
          <tbody style=" font-size: 80.5%;">

              <tr >
                <td>1</td>
                <td>Reporte de ventas del dia</td>
                <td>El reporte perimite obtener la informacion de las ventas de la fecha en especifico</td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#auxiliarEmpeno">
                      <i class="far fa-eye"></i>
                    </button>
                </td>
              </tr>

               <tr >
                <td>2</td>
                <td>Reporte cobros por fecha</td>
                <td>El reporte perimite obtener la informacion de los cobros que se vab a realizar en las fechas establecidas</td>
                <td>
                      <a target="_blank" href="{{route('reportes.create')}}">
                    <button class="btn btn-primary" data-toggle="modal">
                      <i class="far fa-eye"></i>
                    </button>
                     </a>
                </td>
              </tr>
                    <tr >
                <td>3</td>
                <td>Reporte de ventas por semana</td>
                <td>El reporte perimite obtener la informacion de las ventas de las fechas establecidas</td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#auxiliarSemana">
                      <i class="far fa-eye"></i>
                    </button>
                </td>
              </tr>
              <tr >
                <td>4</td>
                <td>Reporte de ventas por semana y vendedor</td>
                <td>El reporte perimite obtener la informacion de las ventas de las fechas establecidas porel vendedor</td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#auxiliarSemanaVendedor">
                      <i class="far fa-eye"></i>
                    </button>
                </td>
              </tr>
             <tr >
                <td>5</td>
                <td>Reporte de renovaciones</td>
                <td>Generara un reporte con las renovaciones de las fechas establecidas</td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#auxiliarRenovaciones">
                      <i class="far fa-eye"></i>
                    </button>
                </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>
</div>
</x-app-layout>
@include('modales.reporteVentas')
@include('modales.reporteVentasSemana')
@include('modales.reporteSemanaVendedor')
@include('modales.reporteRenovaciones')


  <script defer src="{{asset('public/js/jquery/jquery.dataTables.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.bootstrap4.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.fixedHeader.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.responsive.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/responsive.bootstrap.min.js')}}" ></script>
  <script src="{{asset('public/js/bootstrap/bootstrap-select.min.js')}}" ></script>
  <script src="{{asset('public/select2/dist/js/select2.min.js')}}"></script>

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

          $('#proveedores').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#ingresos').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#desempenoSuc').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#refrendoSuc').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#InventarioActivoSelect').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#InventarioRemateSelect').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#CmPlus').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#SelectInventarioAremate').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#finiquitoSelect').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          $('#PolizaGarantia').select2({
            theme: 'bootstrap4',
            width: '100%'
          });

          });

    </script>


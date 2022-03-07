<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="col-md-12 text-center">
      <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
        <div class="card-header">
            <h2> GESTION DE Usuarios</h2>
        </div>
        <div class="card-body">
          <h3>
            <a href="{{route('usuarios.create')}}" style="color:#037DB4;"><i class="far fa-plus-square"></i>&nbsp;&nbsp;Usuario</a>
          </h3>
          <table id="personalInfo" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($user as $user)
                  <tr>

                      <td>{{$user->name}}</td>
                      <td>{{$user->username}}</td>
                      <td>
                        <a href="{{route('usuarios.edit',$user->id)}}">
                          <button class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                          </button>
                        </a>
                      </td>
                      @can('usuarios_destroy')
                          <td>
                              <form method="POST" id="formEliminar" action="" aria-label="{{ __('Usuario') }}" enctype="multipart/form-data">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" id="borrar" value="{{ route('usuarios.destroy',$user->id) }}" name="borrar" class="btn btn-danger"
                                          onclick="  var r = confirm('Estas seguro que deseas Eliminarlo?');
                            if (r == true) {

                            $('#formEliminar').attr('action',this.value).submit();

                            } else {
                            return false;
                            }">
                                      <i class="fas fa-trash-alt"></i>
                                  </button>
                              </form>
                          </td>
                      @endcan
                  </tr>
                     @endforeach

              </tbody>
          </table>
        </div>
      </div>
    </div>
</x-app-layout>

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


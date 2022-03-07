@section('breadcrumb')
   <li class="breadcrumb-item"><a href="{{url('/usuarios')}}">Usuarios</a></li>
@if(!isset($usuarios))
        <li class="breadcrumb-item active" aria-current="page">Create</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          @endif

  
@endsection
<div class="card-body">
  <div class="row">
    <div class="col-md-12 text-center">
        <br>
        <h4>Usuarios</h4>

    </div>
    
     
      <div class="col-md-4">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" 
@if(!isset($usuarios))
placeholder="Nombre"
    @else
    value="{{$usuarios->name}}" 
     @endif
    >
      </div>

<div class="col-md-4">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" name="apellidos" id="apellidos" 
@if(!isset($usuarios))
placeholder="Apellidos"
    @else
    value="{{$usuarios->apellidos}}" 
     @endif
    >
      </div>
       
<div class="col-md-4">
          <label for="rol">Permisos</label>
          <select id="rol" name="rol" class="form-control"> 
@if(!isset($usuarios))
                <option value="1">Todos</option>
                <option value="2">Crear,Editar,Ver,Generar reportes</option>
                <option value="3">Ver,Editar Pagos</option>
                <option value="4">Solamente ver datos del cliente</option>
                
    @else
        @if($usuarios->rol == 1)
                <option selected="" value="1">Todos</option>
                <option value="2">Crear,Editar,Ver,Generar reportes</option>
                <option value="3">Ver,Editar Pagos</option>
                <option value="4">Solamente ver datos del cliente</option>
                @elseif($usuarios->rol == 2)
                <option value="1">Todos</option>
                <option selected="" value="2">Crear,Editar,Ver,Generar reportes</option>
                <option value="3">Ver,Editar Pagos</option>
                <option value="4">Solamente ver datos del cliente</option>
                @elseif($usuarios->rol == 3)
                <option value="1">Todos</option>
                <option value="2">Crear,Editar,Ver,Generar reportes</option>
                <option selected="" value="3">Ver,Editar Pagos</option>
                <option value="4">Solamente ver datos del cliente</option>
                
                @elseif($usuarios->rol == 4)
                <option value="1">Todos</option>
                <option  value="2">Crear,Editar,Ver,Generar reportes</option>
                <option value="3">Ver,Editar Pagos</option>
                <option selected="" value="4">Solamente ver datos del cliente</option>
                @endif
                
     @endif
      </select>
      </div>
      
      <div class="col-md-4">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" name="usuario" id="usuario" 
@if(!isset($usuarios))
placeholder="Usuario"
    @else
    value="{{$usuarios->usuario}}" 
     @endif
    >
      </div>
      
      <div class="col-md-4">
          <label for="password">Contrasenia</label>
          <input type="password" class="form-control" name="password" id="password" 
@if(!isset($usuarios))
placeholder="Contrasena"


     @endif
    >
      </div>

       
</div>


</div>

<div class="card-footer">
    <div class="col-md-12">
      <center>
        <button type="submit" class="btn btn-success">
          <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('Guardar') }}
        </button>
        <a href="{{route('vendedores.index')}}">
          <button type="button" class="btn btn-default" >
            <i class="fas fa-undo-alt"></i>&nbsp;&nbsp;{{ __('Regresar') }}
          </button>
        </a>
      </center>
    </div>
  </div>

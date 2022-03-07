@extends('admin.layouts.menu')
@section('content')
      <form method="POST" id="perfil" class="perfil" action="{{ route('usuarios.update',$usuarios->id) }}" aria-label="{{ __('Perfil') }}" enctype="multipart/form-data">
                  @method('PUT')
        @csrf
<div class="card-body">
  <div class="row">
    <div class="col-md-12 text-center">
        <br>
        <h4>Perfil</h4>

    </div>
    
     <input type="hidden" class="form-control" name="usuario" id="usuario" value="{{$usuarios->usuario}}" >
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
</form>
@endsection
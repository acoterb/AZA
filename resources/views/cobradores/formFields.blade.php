@section('breadcrumb')
   <li class="breadcrumb-item"><a href="{{url('/cobradores')}}">Cobradores</a></li>
@if(!isset($cobradores))
        <li class="breadcrumb-item active" aria-current="page">Create</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          @endif

  
@endsection
<div class="card-body">
  <div class="row">
    <div class="col-md-12 text-center">
        <br>
        <h4>cobradores</h4>

    </div>
    
     
      <div class="col-md-4">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="nombre" 
@if(!isset($cobradores))
placeholder="Nombre"
    @else
    value="{{$cobradores->nombre}}" 
     @endif
    >
      </div>

       <div class="col-md-4">
          <label for="zona">Zona</label>
         <select id="zona" name="zona" class="form-control">
            @foreach($zonas as $zona)
            <option value="{{$zona->id}}">{{$zona->zona}}</option>
            @endforeach
          </select>
      </div>

       
</div>


<div class="card-footer">
    <div class="col-md-12">
      <center>
        <button type="submit" class="btn btn-success">
          <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('Guardar') }}
        </button>
        <a href="{{route('cobradores.index')}}">
          <button type="button" class="btn btn-default" >
            <i class="fas fa-undo-alt"></i>&nbsp;&nbsp;{{ __('Regresar') }}
          </button>
        </a>
      </center>
    </div>
  </div>

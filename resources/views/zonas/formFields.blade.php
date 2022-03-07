@section('breadcrumb')
   <li class="breadcrumb-item"><a href="{{url('/zonas')}}">Zonas</a></li>
@if(!isset($zonas))
        <li class="breadcrumb-item active" aria-current="page">Create</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          @endif

  
@endsection
<div class="card-body">
  <div class="row">
    <div class="col-md-12 text-center">
        <br>
        <h4>Zona</h4>

    </div>
    
     
      <div class="col-md-4">
          <label for="nombre">Zona</label>
          <input type="text" class="form-control" name="nombre" id="nombre" 
@if(!isset($zonas))
placeholder="Nombre"
    @else
    value="{{$zonas->zona}}" 
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
        <a href="{{route('zonas.index')}}">
          <button type="button" class="btn btn-default" >
            <i class="fas fa-undo-alt"></i>&nbsp;&nbsp;{{ __('Regresar') }}
          </button>
        </a>
      </center>
    </div>
  </div>

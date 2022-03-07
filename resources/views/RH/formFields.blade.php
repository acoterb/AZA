@section('breadcrumb')
   <li class="breadcrumb-item"><a href="{{url('/rh')}}">Personal</a></li>
  <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection
<div class="card-body">
  <div class="row">
    <div class="col-md-12 text-center">
        <br>
        <h4>Datos generales</h4>
    </div>
    <input type="hidden" name="todolist" id="todolist" value="">
      <div class="col-md-4">
          <label for="nombre">Nombre</label>
          {{ Form::text("name", null, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'nombre'))}}
      </div>
      <div class="col-md-4">
          <label for="apellid_paterno">Apellido Materno</label>
          {{ Form::text("apellido_paterno", null, array('class' => 'form-control', 'id' => 'apellido_paterno', 'placeholder' => 'Apellido paterno'))}}
      </div>
      <div class="col-md-4">
            <label for="apellido_paterno">Apellido Paterno</label>
            {{ Form::text("apellido_materno", null, array('class' => 'form-control', 'id' => 'apellido_materno', 'placeholder' => 'Apellido materno'))}}
        </div>
        <div class="col-md-4">
            <label for="emali">Correo electronico</label>
            {{ Form::email("email", null, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'example@mail.com'))}}
        </div>
        <div class="col-md-4">
            <label for="password">Contraseña</label>
            {{ Form::password("password", array('class' => 'form-control', 'id' => 'password', 'placeholder' => '*******'))}}
        </div>
        <div class="col-md-4">
            <label for="nss">NSS</label>
            {{ Form::text("nss", null, array('class' => 'form-control', 'id' => 'nss', 'placeholder' => 'nss'))}}
        </div>
        <div class="col-md-4">
            <label for="rfc">RFC</label>
            {{ Form::text("rfc", null, array('class' => 'form-control', 'id' => 'rfc', 'placeholder' => 'XAXX0101000'))}}
        </div>
        <div class="col-md-4">
            <label for="curp">CURP</label>
            {{ Form::text("curp", null, array('class' => 'form-control', 'id' => 'curp', 'placeholder' => 'curp'))}}
        </div>
        <div class="col-md-4">
            <label for="fechaEntrada">Fecha de entrada</label>
            {{ Form::date("fechaEntrada", null, array('class' => 'form-control', 'id' => 'fechaEntrada'))}}
        </div>
        <div class="col-md-4">
            <label for="diasvacaciones">Dias de vacaciones</label>
            <select id="diasVacaciones" name="diasVacaciones" class="form-control">
              @for ($i = 0; $i <= 100; $i++)
                <option value="{{$i}}">{{$i}}</option>
              @endfor
            </select>
        </div>
        <div class="col-md-4">
          <label for="jefeDirecto">Jefe Directo</label>
          <select id="jefeDirecto" name="jefeDirecto" class="form-control">
            @foreach($jefeDirectos as $jefe)
              <option value="{{$jefe->id}}">{{$jefe->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <label for="puesto">Puesto</label>
          <select id="puesto" name="puesto" class="form-control">
            @foreach($puestos as $puesto)
              <option value="{{$puesto->id}}">{{$puesto->puesto}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-4">
          <label for="zona">Zona</label>
          <select id="zona" name="zona" class="form-control">
            @foreach($zonas as $zona)
              <option value="{{$zona->id}}">{{$zona->zona}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <label for="sucursal">Sucursal</label>
          <select id="sucursal" name="sucursal" class="form-control">
            @foreach($sucursales as $sucursal)
              <option value="{{$sucursal->id}}">{{$sucursal->sucursal}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-12 text-center">
            <h4>Documentacion</h4>
        </div>
        <div class="col-md-12">
          <div class="well" style="overflow: auto;">
            <ul id="check-list-box" class="list-group checked-list-box">
              @foreach($documentacion as $documentacion)
                <li class="list-group-item" data-style="button" data-color="success" value="{{$documentacion->id}}">{{$documentacion->descripcion}}</li>
              @endforeach
            </ul>
          </div>
        </div>
        @include("partials.direcciones")
  </div>
</div>

<div class="card-footer">
    <div class="col-md-12">
      <center>
        <button type="submit" class="btn btn-success">
          <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('Guardar') }}
        </button>
        <a href="{{route('rh.index')}}">
          <button type="button" class="btn btn-default" >
            <i class="fas fa-undo-alt"></i>&nbsp;&nbsp;{{ __('Regresar') }}
          </button>
        </a>
      </center>
    </div>
  </div>

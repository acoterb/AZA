<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  <div class="col-md-12">
    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
      <div class="card-header">
        <center>
          <h3>Crear Cliente</h3>
        </center>
      </div>
      <form method="POST" action="{{ route('cliente.store') }}" aria-label="{{ __('Clientes') }}" enctype="multipart/form-data">


        <input type="hidden" name="hasta" id="hasta">
        <input type="hidden" name = "diaHoy" id="diaHoy" value="{{$date_now = date('d-m-Y')}}">
         <input type="hidden" name = "diaHoyMas30" id="diaHoyMas30" value="{{$date_future = strtotime('+30 day', strtotime($date_now))}}">

        <div class="card-body">
          <div class="row">
            @csrf
            <div class="col-md-12">
              <br>
              <center>
                <h4>Datos generales</h4>
              </center>
            </div>
            <div class="col-md-4">
              <label for="vendedor">Vendedor</label>
          <select id="vendedor" name="vendedor" class="form-control">
            @foreach($vendedor as $vendedor)
              <option value="{{$vendedor->numero}}">{{$vendedor->numero}}</option>
            @endforeach
          </select>
            </div>
            <div class="col-md-4">
              <label for="cobrador">Cobrador</label>
               <select id="cobrador" name="cobrador" class="form-control">
            @foreach($cobrador as $cobrador)
              <option value="{{$cobrador->id}}">{{$cobrador->nombre}}</option>
            @endforeach
          </select>
            </div>

             <div class="col-md-4">
              <label for="tipoPoliza">Tipo de poliza</label>
              <select id="tipoPoliza" name="tipoPoliza" class="form-control">
                 <option value="M">Multiple</option>
                <option value="P">Personal</option>
                <option selected  value="D">Daños a 3eros</option>

          </select>
            </div>
            <div class="col-md-4">
                    <label for="fechaInicio">Fecha de inicio de vigencia de poliza</label>
                    <input type="date" value="{{$date_now = date('Y-m-d')}}" id="fechaInicio" name="fechaInicio" class="form-control">
            </div>

            <div class="col-md-4">
                <label for="fechaPrimerPago">Fecha del Primer Pago</label>
                <input value="{{$date_future = date('Y-m-d', $date_future)}}" type="date" id="fechaPrimerPago" name="fechaPrimerPago" class="form-control">
            </div>
              <div class="col-md-4">
              <label for="plazo">Plazo</label>
              <select id="plazo" name="plazo" class="form-control">
                <option value="1">1 año</option>
                <option value="2">2 año</option>
                <option value="3">3 año</option>
                <option value="4">4 año</option>
          </select>
            </div>

            <div class="col-md-4">
              <label for="status">Status</label>
              <select id="status" name="status" class="form-control">
                <option value="Vigente">Vigente</option>
                <option value="Atrasado">Atrasado</option>
                <option value="Cancelado">Cancelado</option>

          </select>
            </div>
                <div class="col-md-4">
              <label for="navideno">Navideño</label>
              <select id="navideno" name="navideno" class="form-control">
                <option value="0">No</option>
                <option value="1">Si</option>
          </select>
            </div>
            <div class="col-md-4">
              <label for="plazo de pagos">Plazo de pagos</label>
              <select id="plazoP" name="plazoP" class="form-control">
                <option value="1">De contado</option>
                <option selected value="4">4 pagos</option>
          </select>
            </div>
            <div class="col-md-4">
              <label for="precio">Precio</label>
              <input id="precio" value="3480" type="text" placeholder="precio" class="form-control" name="precio"  required="true" autofocus>
            </div>
            <div class="col-md-12">
              <label for="observaciones">Observaciones - Sale en poliza</label>
             <textarea class="form-control notemptyField" rows="5" id="observaciones" name="observaciones" ></textarea>
            </div>
            <div class="col-md-4">
              <label for="nombre">Nombre</label>
              <input id="nombre" type="text" placeholder="Nombre" class="form-control" name="nombre" value="{{old('nombre')}}"  autofocus maxlength="30">
            </div>
            <div class="col-md-4">
              <label for="apellido_paterno">Apellidos</label>
              <input id="apellido_paterno" type="text" placeholder="Apellidos" class="form-control" name="Apellidos" value="{{old('Apellidos')}}" maxlength="35" autofocus>
            </div>
            <div class="col-md-4">
              <label for="telefono">Telefono</label>
              <input id="telefono" type="text" placeholder="Telefono" class="form-control" name="telefono" maxlength="14" required="true" value="{{old('telefono')}}"  autofocus>
            </div>
            <div class="col-md-4">
              <label for="telefono_emergencia">Telefono de emergencia</label>
              <input id="telefono_emergencia" type="text" placeholder="telefono_emergencia" class="form-control" name="telefono_emergencia"  maxlength="14"  autofocus>
            </div>




            @include('modales.direcciones')
            @include('modales.vehiculos')
            @include('modales.licencias')
        <div class="col-md-12">
              <label for="observaciones">Observaciones - Privada solo lo ven ustedes</label>
             <textarea class="form-control notemptyField" rows="5" id="observacionesPrivada" name="observacionesPrivada" ></textarea>
            </div>
            </div>


          </div>
        </div>
        <div class="card-footer">
          <div class="col-md-12">
            <center>
              <button type="submit" id="guardar" class="btn btn-success">
                <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('Guardar') }}
              </button>
              <a href="{{route('cliente.index')}}">
                <button type="button" class="btn btn-default" >
                  <i class="fas fa-undo-alt"></i>&nbsp;&nbsp;{{ __('Regresar') }}
                </button>
              </a>
            </center>
          </div>
        </div>
      </form>
      <!-- formulario -->
    </div>
  </div>
</x-app-layout>

  <script defer src="{{asset('js/cliente/cliente.js')}}"></script>

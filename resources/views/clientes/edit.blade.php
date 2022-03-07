<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  <div class="col-md-12">
    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">

      <ul class="nav nav-pills">

      <form method="POST" action="{{ route('cliente.update',$cliente->id) }}" aria-label="{{ __('Clientes') }}" enctype="multipart/form-data">
        @method('PUT')
        <input type="hidden" name="hasta" id="hasta">


        <div class="card-body">
          <div class="row">
            @csrf
            <div class="col-md-12">
              <br>
              <center>
                <h4>Pagos</h4>
              </center>
            </div>

            <div class="col-md-4">
              <label for="pagoInicial">Pago inicial</label>
              <input id="pagoInicial" type="date" class="form-control" name="pagoInicial" value="{{$pagos->pagoinicial}}">
            </div>
            <div class="col-md-4">
              <label for="numPagos">A cuantos pagos</label>
              <input id="numPagos" type="text" class="form-control" name="numPagos" value="{{$pagos->numeropagos}}">
            </div>
            <div class="col-md-4">
              <label for="costo">Costo del servicio</label>
              <input id="costo" type="number" min="0" class="form-control" name="costo" value="{{$pagos->costoservicio}}">
            </div>
            <div class="col-md-3">
              <label for="pago1FechaPropuesta">Fecha que debe pagar el pago 1</label>
              @if($pagosFecha1)
              <input id="pago1FechaPropuesta" type="date" class="form-control" name="pago1FechaPropuesta" value="{{$pagosFecha1->fecha_pago}}">
              @else
              <input id="pago1FechaPropuesta" type="date" class="form-control" name="pago1FechaPropuesta" value="">
              @endif
            </div>
                <div class="col-md-3">
              <label for="pago2FechaPropuesta">Fecha que debe pagar el pago 2</label>
              @if($pagosFecha2)
              <input id="pago2FechaPropuesta" type="date" class="form-control" name="pago2FechaPropuesta" value="{{$pagosFecha2->fecha_pago}}">
              @else
              <input id="pago2FechaPropuesta" type="date" class="form-control" name="pago2FechaPropuesta" value="">
              @endif
            </div>
                        <div class="col-md-3">
              <label for="pago3FechaPropuesta">Fecha que debe pagar el pago 3</label>
              @if($pagosFecha3)
              <input id="pago3FechaPropuesta" type="date" class="form-control" name="pago3FechaPropuesta" value="{{$pagosFecha3->fecha_pago}}">
              @else
              <input id="pago3FechaPropuesta" type="date" class="form-control" name="pago3FechaPropuesta" value="">
              @endif
            </div>
                <div class="col-md-3">
              <label for="pago4FechaPropuesta">Fecha que debe pagar el pago 4</label>
              @if($pagosFecha4)
              <input id="pago4FechaPropuesta" type="date" class="form-control" name="pago4FechaPropuesta" value="{{$pagosFecha4->fecha_pago}}">
              @else
              <input id="pago4FechaPropuesta" type="date" class="form-control" name="pago4FechaPropuesta" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago1">Pago 1 realizado</label>
              <select id="pago1" name="pago1" class="form-control">

                @if($pagosDetalle1)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago2">Pago 2 realizado</label>
              <select id="pago2" name="pago2" class="form-control">

                @if($pagosDetalle2)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago3">Pago 3 realizado</label>
              <select id="pago3" name="pago3" class="form-control">

                @if($pagosDetalle3)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago4">Pago 4 realizado</label>
              <select id="pago4" name="pago4" class="form-control">

                @if($pagosDetalle4)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago1Fecha">Fecha que realiza el pago 1</label>
              @if($pagosDetalle1)
              <input id="pago1Fecha" type="date" class="form-control" name="pago1Fecha" value="{{$pagosDetalle1->fecha_pago}}">
              @else
              <input id="pago1Fecha" type="date" class="form-control" name="pago1Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago2Fecha">Fecha que realiza el pago 2</label>
              @if($pagosDetalle2)
              <input id="pago2Fecha" type="date" class="form-control" name="pago2Fecha" value="{{$pagosDetalle2->fecha_pago}}">
              @else
              <input id="pago2Fecha" type="date" class="form-control" name="pago2Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago1Fecha">Fecha que realiza el pago 3</label>
              @if($pagosDetalle3)
              <input id="pago3Fecha" type="date" class="form-control" name="pago3Fecha" value="{{$pagosDetalle3->fecha_pago}}">
              @else
              <input id="pago3Fecha" type="date" class="form-control" name="pago3Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago4Fecha">Fecha que realiza el pago 4</label>
              @if($pagosDetalle4)
              <input id="pago4Fecha" type="date" class="form-control" name="pago4Fecha" value="{{$pagosDetalle4->fecha_pago}}">
              @else
              <input id="pago4Fecha" type="date" class="form-control" name="pago4Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago1Cantidad">Cantidad pagada del pago 1</label>
              @if($pagosDetalle1)
              <input id="pago1Cantidad" type="number" min="0" class="form-control" name="pago1Cantidad" value="{{$pagosDetalle1->cantidad}}">
              @else
              <input id="pago1Cantidad" type="number" class="form-control" min="0" name="pago1Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago2Cantidad">Cantidad pagada del pago 2</label>
              @if($pagosDetalle2)
              <input id="pago2Cantidad" type="number" min="0" class="form-control" name="pago2Cantidad" value="{{$pagosDetalle2->cantidad}}">
              @else
              <input id="pago2Cantidad"type="number" min="0" class="form-control" name="pago2Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago3Cantidad">Cantidad pagada del pago 3</label>
              @if($pagosDetalle3)
              <input id="pago3Cantidad" type="number" min="0" class="form-control" name="pago3Cantidad" value="{{$pagosDetalle3->cantidad}}">
              @else
              <input id="pago3Cantidad"type="number" min="0" class="form-control" name="pago3Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago4Cantidad">Cantidad pagada del pago 4</label>
              @if($pagosDetalle4)
              <input id="pago4Cantidad" type="number" min="0" class="form-control" name="pago4Cantidad" value="{{$pagosDetalle4->cantidad}}">
              @else
              <input id="pago4Cantidad" type="number" min="0" class="form-control" name="pago4Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label> Concepto pago 1</label>
              @if($pagosDetalle1)
              <textarea id="concepto1" name="concepto1">{{$pagosDetalle1->concepto}}</textarea>
              @else
              <textarea id="concepto1" name="concepto1"></textarea>
              @endif
            </div>



           <div class="col-md-3">
              <label> Concepto pago 2</label>
              @if($pagosDetalle2)
              <textarea id="concepto2" name="concepto2">{{$pagosDetalle2->concepto}}</textarea>
              @else
              <textarea id="concepto2" name="concepto2"></textarea>
              @endif
            </div>



            <div class="col-md-3">
              <label> Concepto pago 3</label>
             @if($pagosDetalle3)
              <textarea id="concepto3" name="concepto3">{{$pagosDetalle3->concepto}}</textarea>
              @else
              <textarea id="concepto3" name="concepto3"></textarea>
              @endif
            </div>



            <div class="col-md-3">
              <label> Concepto pago 4</label>
              @if($pagosDetalle4)
              <textarea id="concepto4" name="concepto4">{{$pagosDetalle4->concepto}}</textarea>
              @else
              <textarea id="concepto4" name="concepto4"></textarea>
              @endif
            </div>


             <div class="col-md-12">
              <br>
              <center>
                <h4>Informacion general</h4>
              </center>
            </div>
            <div class="col-md-12">
              <label for="observaciones ">Observaciones - Privada</label>
             <textarea class="form-control notemptyField" rows="5" id="observacionesPrivada" name="observacionesPrivada"  >{{$cliente->observacion_privada}}</textarea>
            </div>

            <div class="col-md-4">
              <label for="vendedor">Vendedor</label>
          <select id="vendedor" name="vendedor" class="form-control">
            <option selected="" value="{{$cliente->vendedor_id}}">{{$cliente->vendedor_id}}</option>
            @foreach($vendedor as $vendedor)
              <option value="{{$vendedor->numero}}">{{$vendedor->numero}}</option>
            @endforeach

          </select>
            </div>
            <div class="col-md-4">
              <label for="cobrador">Cobrador</label>
               <select id="cobrador" name="cobrador" class="form-control">
                 <option selected="" value="{{$cliente->cobrador_id}}">{{$cliente->cobrador_id}}</option>
            @foreach($cobrador as $cobrador)
              <option value="{{$cobrador->id}}">{{$cobrador->nombre}}</option>
            @endforeach
          </select>
            </div>

             <div class="col-md-4">
              <label for="tipoPoliza">Tipo de poliza</label>
              <select id="tipoPoliza" name="tipoPoliza" class="form-control">
                @if($cliente->tipo == 'P')
                <option selected="" value="P">Personal</option>
                <option value="M">Multiple</option>
                <option value="D">Daños a 3eros</option>
                @elseif($cliente->tipo == 'M')
                <option  value="P">Personal</option>
                <option selected="" value="M">Multiple</option>
                <option value="D">Daños a 3eros</option>
                @else
                <option  value="P">Personal</option>
                <option  value="M">Multiple</option>
                <option selected="" value="D">Daños a 3eros</option>
                @endif
          </select>

            </div>
            <div class="col-md-4">
                    <label for="fechaInicio">Fecha de inicio de vigencia de poliza</label>
                    <input type="date" id="fechaInicio" name="fechaInicio" value="{{$cliente->desde}}" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="fechaFin">Fecha de Fin de vigencia de poliza</label>
                    <input type="date" id="hasta" name="hasta" value="{{$cliente->hasta}}" class="form-control">
                  </div>
              <div class="col-md-4">
              <label for="plazo">Plazo</label>
              <select id="plazo" name="plazo" class="form-control">
                <option value="{{$cliente->plazo}}">{{$cliente->plazo}} año</option>
                <option value="1">1 año</option>
                <option value="2">2 año</option>
                <option value="3">3 año</option>
                <option value="4">4 año</option>
          </select>
            </div>
               <div class="col-md-4">
              <label for="poliza">Poliza</label>
              <input id="poliza" type="text" placeholder="poliza" class="form-control" name="poliza" value="{{$cliente->poliza}}" required autofocus>
            </div>
            <div class="col-md-4">
              <label for="status">Status</label>
              <select id="status" name="status" class="form-control">
                @if($cliente->status_id == 'Vigente')
                  <option selected="" value="Vigente">Vigente</option>
                  <option value="Atrasado">Atrasado</option>
                  <option value="Cancelado">Cancelado</option>
                  <option value="Caida">Caida</option>
                @elseif($cliente->status_id == 'Atrasado')
                  <option value="Vigente">Vigente</option>
                  <option selected=""  value="Atrasado">Atrasado</option>
                  <option value="Cancelado">Cancelado</option>
                  <option value="Caida">Caida</option>
                 @elseif($cliente->status_id == 'Cancelado')
                  <option value="Vigente">Vigente</option>
                  <option value="Atrasado">Atrasado</option>
                  <option selected="" value="Cancelado">Cancelado</option>
                  <option value="Caida">Caida</option>
                  @else
                <option value="Vigente">Vigente</option>
                  <option value="Atrasado">Atrasado</option>
                  <option value="Cancelado">Cancelado</option>
                  <option selected="" value="Caida">Caida</option>
                @endif
          </select>
            </div>
                        <div class="col-md-4">
              <label for="navideno">Navideño</label>
              <select id="navideno" name="navideno" class="form-control">
                @if($cliente->navidena == '0')
                  <option selected="" value="0">No</option>
                  <option value="1">Si</option>
                @else
                  <option value="0">No</option>
                  <option selected=""  value="1">Si</option>

                @endif
          </select>
            </div>
            <div class="col-md-4">
              <label for="plazo de pagos">Plazo de pagos</label>
              <select id="plazoP" name="plazoP" class="form-control">
                @if($pagos->numeropagos == 1)
                <option value="1">De contado</option>
                <option value="2">4 pagos</option>
                @else
                <option value="1">De contado</option>
                <option selected="" value="2">4 pagos</option>
                @endif

          </select>
            </div>
                     <div class="col-md-12">
              <label for="observaciones">Observaciones - Sale en poliza</label>
             <textarea class="form-control notemptyField" rows="5" id="observaciones" name="observaciones"  >{{$cliente->observaciones}}</textarea>
            </div>
            <div class="col-md-4">
              <label for="nombre">Nombre</label>
              <input id="nombre" type="text" placeholder="Nombre" class="form-control" name="nombre" value="{{$cliente->contrato->nombres}}" required autofocus maxlength="30">
            </div>
            <div class="col-md-4">
              <label for="apellido_paterno">Apellidos</label>
              <input id="apellido_paterno" type="text" placeholder="Apellidos" class="form-control" name="Apellidos" value="{{$cliente->contrato->apellidos}}" maxlength="35" autofocus>
            </div>
            <div class="col-md-4">
              <label for="telefono">Telefono</label>
              <input id="telefono" type="text" placeholder="Telefono" class="form-control" name="telefono" value="{{$cliente->contrato->telefono}}" maxlength="14" required="true" autofocus>
            </div>
                <div class="col-md-4">
              <label for="telefono_emergencia">Telefono de emergencia</label>
              <input id="telefono_emergencia" type="text" placeholder="telefono_emergencia" class="form-control" name="telefono_emergencia"   value="{{$cliente->contrato->telefono_emergencia}}" autofocus>
            </div>





            @include('modales.direcciones')
            @include('modales.vehiculos')
            @include('modales.licencias')

            @if($cliente->tipo == 'D')
            <div class="col-md-12">
              <br>
              <center>
                <h4>Gruas</h4>
              </center>
            </div>
             <div class="col-md-4">
              <label for="disponible_grua">Grua disponible</label>
              <select id="disponible_grua" name="disponible_grua" class="form-control">
                @if($grua->disponible == '' || $grua->disponible == '1' )
                  <option selected="" value="1">SI</option>
                  <option value="2">NO</option>
                @else
                  <option  value="1">SI</option>
                  <option selected="" value="2">NO</option>
                @endif
          </select>
            </div>
                <div class="col-md-4">
              <label for="fecha_uso">Fecha de uso</label>
              <input id="fecha_uso" type="date" placeholder="Fecha de uso" class="form-control" name="fecha_uso"  value="{{$grua->fecha_uso}}">
            </div>
            <div class="col-md-4">
              <label for="lugar_compustura">Lugar de compostura</label>
              <input id="lugar_compustura" type="text" placeholder="Lugar de compostura" class="form-control" name="lugar_compustura"   value="{{$grua->lugar_compustura}}">
            </div>
            <div class="col-md-4">
              <label for="lugar_arribo">Lugar de arribo</label>
              <input id="lugar_arribo" type="text" placeholder="Lugar de arribo" class="form-control" name="lugar_arribo"   value="{{$grua->lugar_arribo}}">
            </div>

            @endif
                 </div>


        <div class="card-footer">
          <div class="col-md-12">
            <center>
                @can('clientes_edit')
              <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('Guardar') }}
              </button>
                @endcan
              <a href="{{route('cliente.index')}}">
                <button type="button" class="btn btn-default" >
                  <i class="fas fa-undo-alt"></i>&nbsp;&nbsp;{{ __('Regresar') }}
                </button>
              </a>
            </center>
          </div>
        </div>

      </form>
         </ul>
      <!-- formulario -->
    </div>
  </div>
</x-app-layout>
<script defer src="{{asset('public/js/cliente/cliente.js')}}"></script>



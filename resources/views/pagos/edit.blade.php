<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagos') }}
        </h2>
    </x-slot>

    <div class="col-md-12">
        <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">

                <form method="POST" action="{{ route('pagos.update',$cliente->id) }}" aria-label="{{ __('Pagos') }}" enctype="multipart/form-data">
                    @method('PUT')
                    <input type="hidden" name="hasta" id="hasta">
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <input type="hidden" id="polizaID" name="polizaID" value="{{$cliente->id}}">
                            <div class="col-md-12">
                                <br>
                                <center>
                                    <h4>Informacio general</h4>
                                </center>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <center>
                                    <h4>Informacion general</h4>
                                </center>
                            </div>
                            <div class="col-md-4">
                                <label for="poliza">Poliza</label>
                                <input id="poliza" readonly type="text" placeholder="poliza" class="form-control" name="poliza" value="{{$cliente->poliza}}" required autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" readonly type="text" placeholder="Nombre" class="form-control" name="nombre" value="{{$cliente->contrato->nombres}}" required autofocus maxlength="30">
                            </div>
                            <div class="col-md-4">
                                <label for="apellido_paterno">Apellidos</label>
                                <input id="apellido_paterno"  readonly type="text" placeholder="Apellidos" class="form-control" name="Apellidos" value="{{$cliente->contrato->apellidos}}" maxlength="35" autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="telefono">Telefono</label>
                                <input id="telefono" readonly type="text" placeholder="Telefono" class="form-control" name="telefono" value="{{$cliente->contrato->telefono}}" maxlength="14" required="true" autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="placas">Placas</label>
                                <input type="text" readonly class="form-control" name="placas" id="placas"
                                   value="{{$cliente->vehiculo->placas}}">
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <br>
                                <center>
                                    <h4>Pagos</h4>
                                </center>
                            </div>
                            <div class="col-md-4">
                                <label for="numPagos">A cuantos pagos</label>
                                <input id="numPagos"  readonly type="text" class="form-control" name="numPagos" value="{{$pagos->numeropagos}}">
                            </div>
                            <div class="col-md-4">
                                <label for="pagosRealizados">Pagos Realizados</label>
                                <input id="pagosRealizados"  readonly type="text" class="form-control" name="pagosRealizados" value="{{$pagosRealizados}}">
                            </div>
                            <div class="col-md-4">
                                <label for="costo">Costo</label>
                                <input id="costo" readonly type="text" placeholder="costo" class="form-control" name="costo" value="{{$pagos->costoservicio}}">
                            </div>
                            <div class="col-md-4">
                                <label for="pagado">Cantidad pagada</label>
                                <input id="pagado" readonly type="text" placeholder="pagado" class="form-control" name="pagado" value="{{$cantidadPagada}}">
                            </div>
                            <div class="col-md-4">
                                <label for="pago">Cantidad a pagar</label>
                                <input id="pago"  type="number" min="0" class="form-control" name="pago"  required autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="formaPago">Forma de pago</label>
                                <select id="formaPago" name="formaPago" class="form-control">
                                        <option value="efectivo">Efectivo</option>
                                        <option value="transferencia">Transferencia</option>
                                         <option value="tarjeta">Tarjeta</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="fecha_pago">Fecha que pago</label>
                                <input type="date" value="{{$date_now = date('Y-m-d')}}" id="fecha_pago" name="fecha_pago" class="form-control">
                            </div>

                            <div class="col-md-12">
                                <label for="concepto">Concepto</label>
                                <textarea class="form-control notemptyField" rows="5" id="concepto" name="concepto" ></textarea>
                            </div>


                        </div>

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

            <!-- formulario -->
        </div>
    </div>
</x-app-layout>
<script defer src="{{asset('public/js/cliente/cliente.js')}}"></script>



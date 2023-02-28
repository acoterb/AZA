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

            <!--A partir de aquí si son 12 pagos, apareceran los 8 conceptos restantes-->

            @if($pagos->numeropagos == 5)
            <div class="col-md-3">
              <br>
              <label for="pago5FechaPropuesta">Fecha que debe pagar el pago 5</label>
              @if($pagosFecha5)
              <input id="pago5FechaPropuesta" type="date" class="form-control" name="pago5FechaPropuesta" value="{{$pagosFecha5->fecha_pago}}">
              @else
              <input id="pago5FechaPropuesta" type="date" class="form-control" name="pago5FechaPropuesta" value="">
              @endif
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            @endif
             @if($pagos->numeropagos > 5)
            <div class="col-md-3">
              <br>
              <label for="pago6FechaPropuesta">Fecha que debe pagar el pago 6</label>
              @if($pagosFecha6)
              <input id="pago6FechaPropuesta" type="date" class="form-control" name="pago6FechaPropuesta" value="{{$pagosFecha6->fecha_pago}}">
              @else
              <input id="pago6FechaPropuesta" type="date" class="form-control" name="pago6FechaPropuesta" value="">
              @endif
            </div>
            <div class="col-md-3">
              <br>
              <label for="pago7FechaPropuesta">Fecha que debe pagar el pago 7</label>
              @if($pagosFecha7)
              <input id="pago7FechaPropuesta" type="date" class="form-control" name="pago7FechaPropuesta" value="{{$pagosFecha7->fecha_pago}}">
              @else
              <input id="pago7FechaPropuesta" type="date" class="form-control" name="pago7FechaPropuesta" value="">
              @endif
            </div>
            <div class="col-md-3">
              <br>
              <label for="pago8FechaPropuesta">Fecha que debe pagar el pago 8</label>
              @if($pagosFecha8)
              <input id="pago8FechaPropuesta" type="date" class="form-control" name="pago8FechaPropuesta" value="{{$pagosFecha8->fecha_pago}}">
              @else
              <input id="pago8FechaPropuesta" type="date" class="form-control" name="pago8FechaPropuesta" value="">
              @endif
            </div>
            @endif
            @if($pagos->numeropagos == 5)
            <div class="col-md-3">
              <label for="pago5">Pago 5 realizado</label>
              <select id="pago5" name="pago5" class="form-control">

                @if($pagosDetalle5)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            @endif
            @if($pagos->numeropagos > 5)
            <div class="col-md-3">
              <label for="pago6">Pago 6 realizado</label>
              <select id="pago6" name="pago6" class="form-control">

                @if($pagosDetalle6)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago7">Pago 7 realizado</label>
              <select id="pago7" name="pago7" class="form-control">

                @if($pagosDetalle7)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago8">Pago 8 realizado</label>
              <select id="pago8" name="pago8" class="form-control">

                @if($pagosDetalle8)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            @endif
            @if($pagos->numeropagos == 5)
            <div class="col-md-3">
              <label for="pago5Fecha">Fecha que realiza el pago 5</label>
              @if($pagosDetalle5)
              <input id="pago5Fecha" type="date" class="form-control" name="pago5Fecha" value="{{$pagosDetalle5->fecha_pago}}">
              @else
              <input id="pago5Fecha" type="date" class="form-control" name="pago5Fecha" value="">
              @endif
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            @endif
            @if($pagos->numeropagos > 5)
            <div class="col-md-3">
              <label for="pago6Fecha">Fecha que realiza el pago 6</label>
              @if($pagosDetalle6)
              <input id="pago6Fecha" type="date" class="form-control" name="pago6Fecha" value="{{$pagosDetalle6->fecha_pago}}">
              @else
              <input id="pago6Fecha" type="date" class="form-control" name="pago6Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago7Fecha">Fecha que realiza el pago 7</label>
              @if($pagosDetalle7)
              <input id="pago7Fecha" type="date" class="form-control" name="pago7Fecha" value="{{$pagosDetalle7->fecha_pago}}">
              @else
              <input id="pago7Fecha" type="date" class="form-control" name="pago7Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago8Fecha">Fecha que realiza el pago 8</label>
              @if($pagosDetalle8)
              <input id="pago8Fecha" type="date" class="form-control" name="pago8Fecha" value="{{$pagosDetalle8->fecha_pago}}">
              @else
              <input id="pago8Fecha" type="date" class="form-control" name="pago8Fecha" value="">
              @endif
            </div>
            @endif
            @if($pagos->numeropagos == 5)
            <div class="col-md-3">
              <label for="pago5Cantidad">Cantidad pagada del pago 5</label>
              @if($pagosDetalle5)
              <input id="pago5Cantidad" type="number" min="0" class="form-control" name="pago5Cantidad" value="{{$pagosDetalle5->cantidad}}">
              @else
              <input id="pago5Cantidad" type="number" class="form-control" min="0" name="pago5Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            @endif
            @if($pagos->numeropagos > 5)
            <div class="col-md-3">
              <label for="pago6Cantidad">Cantidad pagada del pago 6</label>
              @if($pagosDetalle6)
              <input id="pago6Cantidad" type="number" min="0" class="form-control" name="pago6Cantidad" value="{{$pagosDetalle6->cantidad}}">
              @else
              <input id="pago6Cantidad"type="number" min="0" class="form-control" name="pago6Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago7Cantidad">Cantidad pagada del pago 7</label>
              @if($pagosDetalle7)
              <input id="pago7Cantidad" type="number" min="0" class="form-control" name="pago7Cantidad" value="{{$pagosDetalle7->cantidad}}">
              @else
              <input id="pago7Cantidad"type="number" min="0" class="form-control" name="pago7Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago8Cantidad">Cantidad pagada del pago 8</label>
              @if($pagosDetalle8)
              <input id="pago8Cantidad" type="number" min="0" class="form-control" name="pago8Cantidad" value="{{$pagosDetalle8->cantidad}}">
              @else
              <input id="pago8Cantidad" type="number" min="0" class="form-control" name="pago8Cantidad" value="">
              @endif
            </div>
            @endif
            @if($pagos->numeropagos == 5)
            <div class="col-md-3">
              <label> Concepto pago 5</label>
              @if($pagosDetalle5)
              <textarea id="concepto5" name="concepto5">{{$pagosDetalle5->concepto}}</textarea>
              @else
              <textarea id="concepto5" name="concepto5"></textarea>
              @endif
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            @endif
            @if($pagos->numeropagos > 5)
           <div class="col-md-3">
              <label> Concepto pago 6</label>
              @if($pagosDetalle6)
              <textarea id="concepto6" name="concepto6">{{$pagosDetalle6->concepto}}</textarea>
              @else
              <textarea id="concepto6" name="concepto6"></textarea>
              @endif
            </div>

            <div class="col-md-3">
              <label> Concepto pago 7</label>
              @if($pagosDetalle7)
              <textarea id="concepto7" name="concepto7">{{$pagosDetalle7->concepto}}</textarea>
              @else
              <textarea id="concepto7" name="concepto7"></textarea>
              @endif
            </div>

            <div class="col-md-3">
              <label> Concepto pago 8</label>
              @if($pagosDetalle8)
              <textarea id="concepto8" name="concepto8">{{$pagosDetalle8->concepto}}</textarea>
              @else
              <textarea id="concepto8" name="concepto8"></textarea>
              @endif
            </div>
            @endif
            @if($pagos->numeropagos > 8)
            <div class="col-md-3">
              <br>
              <label for="pago9FechaPropuesta">Fecha que debe pagar el pago 9</label>
              @if($pagosFecha9)
              <input id="pago9FechaPropuesta" type="date" class="form-control" name="pago9FechaPropuesta" value="{{$pagosFecha9->fecha_pago}}">
              @else
              <input id="pago9FechaPropuesta" type="date" class="form-control" name="pago9FechaPropuesta" value="">
              @endif
            </div>
            <div class="col-md-3">
              <br>
              <label for="pago10FechaPropuesta">Fecha que debe pagar el pago 10</label>
              @if($pagosFecha10)
              <input id="pago10FechaPropuesta" type="date" class="form-control" name="pago10FechaPropuesta" value="{{$pagosFecha10->fecha_pago}}">
              @else
              <input id="pago10FechaPropuesta" type="date" class="form-control" name="pago10FechaPropuesta" value="">
              @endif
            </div>
            <div class="col-md-3">
              <br>
              <label for="pago11FechaPropuesta">Fecha que debe pagar el pago 11</label>
              @if($pagosFecha11)
              <input id="pago11FechaPropuesta" type="date" class="form-control" name="pago11FechaPropuesta" value="{{$pagosFecha11->fecha_pago}}">
              @else
              <input id="pago11FechaPropuesta" type="date" class="form-control" name="pago11FechaPropuesta" value="">
              @endif
            </div>
            <div class="col-md-3">
              <br>
              <label for="pago12FechaPropuesta">Fecha que debe pagar el pago 12</label>
              @if($pagosFecha12)
              <input id="pago12FechaPropuesta" type="date" class="form-control" name="pago12FechaPropuesta" value="{{$pagosFecha12->fecha_pago}}">
              @else
              <input id="pago12FechaPropuesta" type="date" class="form-control" name="pago12FechaPropuesta" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago9">Pago 9 realizado</label>
              <select id="pago9" name="pago9" class="form-control">

                @if($pagosDetalle9)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago10">Pago 10 realizado</label>
              <select id="pago10" name="pago10" class="form-control">

                @if($pagosDetalle10)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago11">Pago 11 realizado</label>
              <select id="pago11" name="pago11" class="form-control">

                @if($pagosDetalle11)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago12">Pago 12 realizado</label>
              <select id="pago12" name="pago12" class="form-control">

                @if($pagosDetalle12)
                <option value="0"> No</option>
                <option selected="" value="1"> Si</option>
                @else
                <option value="0"> No</option>
                <option value="1"> Si</option>
                @endif

              </select>
            </div>
            <div class="col-md-3">
              <label for="pago9Fecha">Fecha que realiza el pago 9</label>
              @if($pagosDetalle9)
              <input id="pago9Fecha" type="date" class="form-control" name="pago9Fecha" value="{{$pagosDetalle9->fecha_pago}}">
              @else
              <input id="pago9Fecha" type="date" class="form-control" name="pago9Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago10Fecha">Fecha que realiza el pago 10</label>
              @if($pagosDetalle10)
              <input id="pago10Fecha" type="date" class="form-control" name="pago10Fecha" value="{{$pagosDetalle10->fecha_pago}}">
              @else
              <input id="pago10Fecha" type="date" class="form-control" name="pago10Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago11Fecha">Fecha que realiza el pago 11</label>
              @if($pagosDetalle11)
              <input id="pago11Fecha" type="date" class="form-control" name="pago11Fecha" value="{{$pagosDetalle11->fecha_pago}}">
              @else
              <input id="pago11Fecha" type="date" class="form-control" name="pago11Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago12Fecha">Fecha que realiza el pago 12</label>
              @if($pagosDetalle12)
              <input id="pago12Fecha" type="date" class="form-control" name="pago12Fecha" value="{{$pagosDetalle12->fecha_pago}}">
              @else
              <input id="pago12Fecha" type="date" class="form-control" name="pago12Fecha" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago9Cantidad">Cantidad pagada del pago 9</label>
              @if($pagosDetalle9)
              <input id="pago9Cantidad" type="number" min="0" class="form-control" name="pago9Cantidad" value="{{$pagosDetalle9->cantidad}}">
              @else
              <input id="pago9Cantidad" type="number" class="form-control" min="0" name="pago9Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago10Cantidad">Cantidad pagada del pago 10</label>
              @if($pagosDetalle10)
              <input id="pago10Cantidad" type="number" min="0" class="form-control" name="pago10Cantidad" value="{{$pagosDetalle10->cantidad}}">
              @else
              <input id="pago10Cantidad"type="number" min="0" class="form-control" name="pago10Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago11Cantidad">Cantidad pagada del pago 11</label>
              @if($pagosDetalle11)
              <input id="pago11Cantidad" type="number" min="0" class="form-control" name="pago11Cantidad" value="{{$pagosDetalle11->cantidad}}">
              @else
              <input id="pago11Cantidad"type="number" min="0" class="form-control" name="pago11Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label for="pago12Cantidad">Cantidad pagada del pago 12</label>
              @if($pagosDetalle12)
              <input id="pago12Cantidad" type="number" min="0" class="form-control" name="pago12Cantidad" value="{{$pagosDetalle12->cantidad}}">
              @else
              <input id="pago12Cantidad" type="number" min="0" class="form-control" name="pago12Cantidad" value="">
              @endif
            </div>
            <div class="col-md-3">
              <label> Concepto pago 9</label>
              @if($pagosDetalle9)
              <textarea id="concepto9" name="concepto9">{{$pagosDetalle9->concepto}}</textarea>
              @else
              <textarea id="concepto9" name="concepto9"></textarea>
              @endif
            </div>

           <div class="col-md-3">
              <label> Concepto pago 10</label>
              @if($pagosDetalle10)
              <textarea id="concepto10" name="concepto10">{{$pagosDetalle10->concepto}}</textarea>
              @else
              <textarea id="concepto10" name="concepto10"></textarea>
              @endif
            </div>

            <div class="col-md-3">
              <label> Concepto pago 11</label>
              @if($pagosDetalle11)
              <textarea id="concepto11" name="concepto11">{{$pagosDetalle11->concepto}}</textarea>
              @else
              <textarea id="concepto11" name="concepto11"></textarea>
              @endif
            </div>

            <div class="col-md-3">
              <label> Concepto pago 12</label>
              @if($pagosDetalle12)
              <textarea id="concepto12" name="concepto12">{{$pagosDetalle12->concepto}}</textarea>
              @else
              <textarea id="concepto12" name="concepto12"></textarea>
              @endif
            </div>
            @endif

            <!--Aquí termina-->

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
                @if($cliente->plazo <1)
                <option value="0.1">1 mes</option>
                <option value="0.5">6 meses</option>
                @else

                <option value="{{$cliente->plazo}}">{{$cliente->plazo}} año</option>
                @endif
                <option value="0.1">1 mes</option>
                <option value="0.5">6 meses</option>
                <option value="1">1 año</option>
                <option value="2">2 año</option>
                <option value="3">3 año</option>
                <option value="4">4 año</option>
          </select>
            </div>

            <div class="col-md-4">
              <label for="formaPago">Forma de pago</label>
              <select id="formaPago" name="formaPago" class="form-control">
                @if($pagos->forma_pago == 'Efectivo')
                <option  selected value="Efectivo">Efectivo</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Deposito">Deposito</option>
                <option value="Oficina">Oficina</option>
                @elseif($pagos->forma_pago == 'Tarjeta')
                <option   value="Efectivo">Efectivo</option>
                <option selected value="Tarjeta">Tarjeta</option>
                <option value="Deposito">Deposito</option>
                <option value="Oficina">Oficina</option>
                @elseif($pagos->forma_pago == 'Deposito')
                <option  value="Efectivo">Efectivo</option>
                <option  value="Tarjeta">Tarjeta</option>
                <option  selected value="Deposito">Deposito</option>
                <option  value="Oficina">Oficina</option>
                @else
                <option  value="Efectivo">Efectivo</option>
                <option  value="Tarjeta">Tarjeta</option>
                <option  value="Deposito">Deposito</option>
                <option  selected value="Oficina">Oficina</option>
                @endif
                
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
                <option value="3">3 pagos</option>
                <option value="4">4 pagos</option>
                <option value="5">5 pagos</option>
                <option value="12">12 pagos</option>
                @elseif($pagos->numeropagos == 3)
                <option value="1">De contado</option>
                <option selected value="3">3 pagos</option>
                <option value="4">4 pagos</option>
                <option value="5">5 pagos</option>
                <option value="12">12 pagos</option>
                @elseif($pagos->numeropagos == 5)
                <option value="1">De contado</option>
                <option value="3">3 pagos</option>
                <option value="4">4 pagos</option>
                <option  selected value="5">5 pagos</option>
                <option value="12">12 pagos</option>
                @elseif($pagos->numeropagos == 12)
                <option value="1">De contado</option>
                <option value="3">3 pagos</option>
                <option value="4">4 pagos</option>
                <option value="5">5 pagos</option>
                <option selected value="12">12 pagos</option>
                @else
                <option value="1">De contado</option>
                <option value="3">3 pagos</option>
                <option selected value="4">4 pagos</option>
                <option value="5">5 pagos</option>
                <option value="12">12 pagos</option>
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



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
          <h3>Editar Cliente</h3>
        </center>
      </div>


      <form method="POST" action="{{ route('choques.store') }}" aria-label="{{ __('Clientes') }}" enctype="multipart/form-data">

        @csrf



        <div class="card-body">
          <div class="row">
            <input type="hidden" name="contrato_id" value="{{$poliza->cliente_id}}">


             <div class="col-md-4">
              <label for="poliza">Poliza</label>
              <input id="poliza" type="text"  class="form-control" name="poliza" value="{{$poliza->poliza}}" readonly="true">
            </div>
             <div class="col-md-4">
              <label for="satus">status</label>
              <input id="satus" type="text"  class="form-control" name="satus" value="{{$poliza->status_id}}" readonly="true">
            </div>
            <div class="col-md-4">
              <label for="numeroChoques">numero de Choques</label>
              <input id="numeroChoques" type="text"  class="form-control" name="numeroChoques" value="{{$poliza->num_choques}}" readonly="true">
            </div>
             <div class="col-md-4">
              <label for="fechaChoque">fecha del Choque</label>
              <input id="fechaChoque" type="date"  class="form-control" name="fechaChoque" value="{{$poliza->num_choques}}" required="true" autofocus="true">
            </div>
               <div class="col-md-4">
               <label for="juridico">Mandar a juridico</label>
              <select id="juridico" name="juridico" class="form-control">
                <option value="normal">No</option>
                <option value="juridico">Si</option>
          </select>
            </div>

            <div class="col-md-12">
              <label for="descripcion">Descripcion</label>
             <textarea class="form-control notemptyField" rows="5" id="descripcion" name="descripcion" ></textarea>
            </div>




      </div>
            </div>
        <div class="card-footer">
          <div class="col-md-12">
            <center>
              <button type="submit" class="btn btn-success">
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

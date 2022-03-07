<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="col-md-12 text-center">
      <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
        <div class="card-header">
            <h2> GESTION DE CHOQUES</h2>
        </div>
              <form method="POST" action="{{ route('choquesBusqueda') }}" aria-label="{{ __('Clientes') }}" enctype="multipart/form-data">
       <div class="card-body">
  <div class="row">

    @csrf

      <div class="col-md-4">

          <input type="text" class="form-control" name="poliza" id="poliza" placeholder="Numero de poliza">


      </div>
           <div class="col-md-4">

         <button type="submit" class="btn btn-success" >Buscar</button>


      </div>

    </div>

    </div>
    </form>

      </div>
</div>
</x-app-layout>

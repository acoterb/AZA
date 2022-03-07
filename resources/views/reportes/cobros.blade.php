@extends('admin.layouts.menu')

@section('breadcrumb')
  <li class="breadcrumb-item active" aria-current="page">reportes</li>
@endsection
@section('content')
    <div class="col-md-12 text-center">
      <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
        <div class="card-header">
            <h2> Generar Reporte de cobros</h2>
        </div>
              <form method="POST" action="{{ route('reportes.store') }}" aria-label="{{ __('Clientes') }}" enctype="multipart/form-data">
       <div class="card-body">
  <div class="row">

    @csrf
     
      <div class="col-md-4">

          <input type="text" class="form-control" name="poliza" id="poliza" placeholder="Numero de poliza"> 


      </div>
           <div class="col-md-4">

         <button type="button" class="btn btn-success" >Añadir</button>


      </div>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"># pagare</th>
      <th scope="col">Poliza</th>
      <th scope="col">Nombre completo</th>
      <th scope="col">Valor pagare</th>
      <th scope="col">Fecha vencimiento</th>
       <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="info">

    
  </tbody>
</table>

    </div>

    </div>
    </form>

@endsection


@push('js')

  <script defer src="{{asset('public/js/jquery/jquery.dataTables.min.js')}}" ></script>
    <script defer src="{{asset('public/js/reportes/cobros.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.bootstrap4.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.fixedHeader.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/dataTables.responsive.min.js')}}" ></script>
  <script defer src="{{asset('public/js/jquery/responsive.bootstrap.min.js')}}" ></script>

@endpush

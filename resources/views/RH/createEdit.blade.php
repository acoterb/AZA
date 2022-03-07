@extends('admin.layouts.menu')
@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/rh/todolist.css')}}">
@endpush

@section('content')
  <div class="col-md-12">
    <div class="card" style="box-shadow: 0 5px 5px 0 rgba(0,0,0,0.5);">
      @if(isset($user))
          {{ Form::model($user, ['route' => ['rh.update', $user->id], 'method' => 'put', 'onsubmit' => 'before_submit();']) }}
      @else
          {{ Form::open(['route' => 'rh.store', 'method' => 'post']) }}
      @endif
      @include('RH.formFields')
    </div>
  </div>

{{ Form::close() }}

@endsection

@push('js')
  <script defer src="{{asset('/js/rh/todolist.js')}}" crossorigin="anonymous"></script>
@endpush

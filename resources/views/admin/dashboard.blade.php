@extends('admin.layouts.menu')

@section('content')
<style>
.container {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: none;
}
</style>
Se agrego este chat es aun prueba, solo tiene historial para 15 mensajes y al actualizar se pierde el chat para que lo mantengan Abierto sin actualizar por ahorita
<div class="container"> 
  <iframe class="responsive-iframe" src="http://chat.sistemaquality.com/?usuario={{Auth::user()->name}}"></iframe>
</div>
  
@endsection

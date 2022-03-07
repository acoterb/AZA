
<br>
<div class="col-md-12">
    <br>
    <center>
      <h4>Vehiculo</h4>
    </center>
</div>

<div class="col-md-4">
    <div class="input-group-addon">Marca</div>
  <input type="text" class="form-control" name="marca" id="marca"
@if(isset($cliente))
value="{{$cliente->vehiculo->marca}}">
@else
placeholder="marca">
     @endif

</div>
<div class="col-md-4">

    <div class="input-group-addon">Sub marca</div>
    <input type="text" class="form-control" name="submarca" id="submarca"
    @if(isset($cliente))
value="{{$cliente->vehiculo->submarca}}"
     @else
    placeholder="submarca"
     @endif
    >
</div>

<div class="col-md-4">
    <div class="input-group-addon">Tipo</div>
    <input type="text" class="form-control" name="tipo" id="tipo"
@if(isset($cliente))
value="{{$cliente->vehiculo->tipo}}"

     @else
    placeholder="tipo"
     @endif
    >
</div>
<div class="col-md-4">

    <div class="input-group-addon">Modelo</div>
    <input type="text" class="form-control" name="modelo" id="modelo"
    @if(isset($cliente))
value="{{$cliente->vehiculo->modelo}}"
     @else
    placeholder="modelo"
     @endif
     >
</div>



<div class="col-md-4">

    <div class="input-group-addon">Servicio</div>
    <input type="text" maxlength = '20' class="form-control" name="servicio" id="servicio"
@if(isset($cliente))
value="{{$cliente->vehiculo->servicio}}"
     @else
    placeholder="servicio" value = "PARTICULAR"
     @endif
   >
</div>
<div class="col-md-4">

    <div class="input-group-addon">Color</div>
    <input type="text" maxlength = '20' class="form-control" name="color" id="color"
@if(isset($cliente))
value="{{$cliente->vehiculo->color}}"
     @else
    placeholder="color"
     @endif
   >
</div>
<div class="col-md-4">

    <div class="input-group-addon">Placas</div>
    <input type="text" maxlength = '20' class="form-control" name="placas" id="placas"
@if(isset($cliente))
value="{{$cliente->vehiculo->placas}}"
     @else
    placeholder="placas"
     @endif
   >
</div>
<div class="col-md-4">

    <div class="input-group-addon">Estado</div>
    <input type="text" maxlength = '20' class="form-control" name="estadoVehiculo" id="estado"
@if(isset($cliente))
value="{{$cliente->vehiculo->estado}}"
     @else
    placeholder="estado" value ="JALISCO"
     @endif
   >
</div>
<div class="col-md-4">

    <div class="input-group-addon"># de serie</div>
    <input type="text" maxlength = '20' class="form-control" name="serie" id="serie"
@if(isset($cliente))
value="{{$cliente->vehiculo->nserie}}"
     @else
    placeholder="# de serie"
     @endif
   >
</div>
<div class="col-md-4">

    <div class="input-group-addon"># de registro</div>
    <input type="text" maxlength = '20' class="form-control" name="registro" id="registro"
@if(isset($cliente))
value="{{$cliente->vehiculo->nregistro}}"
     @else
    placeholder="# de registro"
     @endif
   >
</div>
<div class="col-md-4">

    <div class="input-group-addon"># de motor</div>
    <input type="text" maxlength = '20' class="form-control" name="motor" id="motor"
@if(isset($cliente))
value="{{$cliente->vehiculo->nmotor}}"
     @else
    placeholder="# de motor"
     @endif
   >
</div>



<br>
<div class="col-md-12">
    <br>
    <center>
      <h4>Licencia de conducir</h4>
    </center>
</div>

<div class="col-md-4">

    <div class="input-group-addon">Licencia</div>
  <input type="text" class="form-control" name="licencia" id="licencia"
@if(isset($cliente))
value="{{$cliente->licencia->nlicencia}}">
@else
placeholder="licencia">
     @endif

</div>
<div class="col-md-4">

    <div class="input-group-addon">Clase</div>
    <input type="text" class="form-control" name="clase" id="clase"
    @if(isset($cliente))
value="{{$cliente->licencia->clase}}"
     @else
    placeholder="clase"
     @endif
    >
</div>

<div class="col-md-4">

    <div class="input-group-addon">Expira</div>
    <input type="text" class="form-control" name="expira" id="expira"
    @if(isset($cliente))
value="{{$cliente->licencia->expira}}"
     @else
    placeholder="expira"
     @endif
     >
</div>



<div class="col-md-4">

    <div class="input-group-addon">Estado</div>
    <input type="text" maxlength = '20' class="form-control" name="estadoLicencia" id="estado"
@if(isset($cliente))
value="{{$cliente->licencia->estado}}"
     @else
    placeholder="estado" value = "JALISCO"
     @endif
   >
</div>

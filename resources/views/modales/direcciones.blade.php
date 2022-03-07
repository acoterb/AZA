
    <br>
    <div class="col-md-12">
        <br>
        <center>
          <h4>Dirección</h4>
        </center>
    </div>

    <div class="col-md-4">
        <label class="sr-only" for="calle">Calle</label>
        <div class="input-group-addon">Calle</div>
      <input type="text" class="form-control" name="calle" id="calle"
    @if(isset($clientes))
       value="{{$clientes->direccion->calle}}" >
    @else
    placeholder="calle">
         @endif

    </div>
    <div class="col-md-4">

        <div class="input-group-addon">Colonia</div>
        <input type="text" class="form-control" name="colonia" id="colonia"
        @if(isset($clientes))
    value="{{$clientes->direccion->colonia}}"
         @else
        placeholder="colonia"
         @endif
        >
    </div>

    <div class="col-md-4">
        <div class="input-group-addon">Cruzes</div>
        <input type="text" class="form-control" name="cruzes" id="cruzes"
    @if(isset($clientes))
    value="{{$clientes->direccion->cruzes}}"

         @else
        placeholder="cruzes"
         @endif
        >
    </div>
    <div class="col-md-4">

        <div class="input-group-addon">Estado</div>
        <input type="text" class="form-control" name="estadoDireccion" id="estado"
        @if(isset($clientes))
    value="{{$clientes->direccion->estado}}"
         @else
        placeholder="estado" value="JALISCO"
         @endif
         >
    </div>



    <div class="col-md-4">

        <div class="input-group-addon">Ciudad</div>
        <input type="text" maxlength = '20' class="form-control" name="ciudad" id="ciudad"
    @if(isset($clientes))
    value="{{$clientes->direccion->ciudad}}"
         @else
        placeholder="ciudad"
         @endif
       >
    </div>

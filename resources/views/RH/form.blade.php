<form method="POST" action="{{route('rh.store')}}">
   {{ csrf_field() }}
  <!-- Modal -->
  <div class="modal fade col-md-12" id="AgregarCAndidato" tabindex="-100" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div class="row">
                  <div class="col-md-6">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="nombre" required>
                  </div>
                  <div class="col-md-6">
                      <label for="apellid_paterno">Apellido Materno</label>
                      <input rows="1" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido materno"></textarea>
                  </div>
                  <div class="col-md-6">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input rows="1" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido Paterno"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="emali">Correo electronico</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="example@mail.com">
                    </div>
                    <div class="col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="*******">
                    </div>
                </div>

              <div class="row">
                  <div class="col-md-4">
                      <label for="nss">NSS</label>
                      <input rows="1" class="form-control" name="nss" id="nss" placeholder="nss"></textarea>
                  </div>

                  <div class="col-md-4">
                    <label for="rfc">RFC</label>
                     <input rows="1" class="form-control" name="rfc" id="rfc" placeholder="rfc"></textarea>
                  </div>

                  <div class="col-md-4">
                    <label for="curp">CURP</label>
                     <input rows="1" class="form-control" name="curp" id="curp" placeholder="curp"></textarea>
                  </div>
                  <div class="col-md-4">
                      <label for="rzon">Razon</label>
                     <input rows="1" class="form-control" name="razon" id="razon" placeholder="razon social"></textarea>
                  </div>
                  <div class="col-md-4">
                    <label for="fechaEntrada">Fecha de entrada</label>
                    <input type="date" id="fechaEntrada" name="fechaEntrada" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="diasvacaciones">Dias de vacaciones</label>
                    <select id="diasVacaciones" name="diasVacaciones" class="form-control">
                      @for ($i = 0; $i <= 100; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="jefeDirecto">Jefe Directo</label>
                    <select id="jefeDirecto" name="jefeDirecto" class="form-control">
                      @foreach($jefeDirectos as $jefe)
                        <option value="{{$jefe->id}}">{{$jefe->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="puesto">Puesto</label>
                    <select id="puesto" name="puesto" class="form-control">
                      @foreach($puestos as $puesto)
                        <option value="{{$puesto->id}}">{{$puesto->puesto}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="encuesta">Encuesta</label>
                    <select id="encuestaSalida" name="encuestaSalida" class="form-control">
                      @foreach($encuestaSalida as $encuesta)
                        <option value="{{$encuesta->id}}">{{$encuesta->id}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="zona">Zona</label>
                    <select id="zona" name="zona" class="form-control">
                      @foreach($zonas as $zona)
                        <option value="{{$zona->id}}">{{$zona->zona}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="sucursal">Sucursal</label>
                    <select id="sucursal" name="sucursal" class="form-control">
                      @foreach($sucursales as $sucursal)
                        <option value="{{$sucursal->id}}">{{$sucursal->sucursal}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
            </div>
                @include("partials.direcciones")
                 <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
          </div>



        </div>
      </div>
    </div>
</form>

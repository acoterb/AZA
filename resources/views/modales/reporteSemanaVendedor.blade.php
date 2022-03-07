<div class="modal fade" id="auxiliarSemanaVendedor" tabindex="-1" role="dialog" aria-labelledby="auxiliarSemanaVendedor" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="auxiliarSemanaVendedor">Reporte de ventas Semana</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  action="{{route('reporteSemanaVendedor')}}" method="GET" target="_black">
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label text-primary">Fecha</label>
            <div class="col-4">
              Inicio<input class="form-control" type="date" id="fechaInicio" name="fechaInicio" required>
            </div>
                <div class="col-4">
              Final<input class="form-control" type="date" id="fechaFinal" name="fechaFinal" required>
            </div>
            
                <div class="col-4">
              Vendedor<input class="form-control" type="number" id="vendedor" name="vendedor" required>
            </div>
            
            @include('modales.tipoExportacion')
            
            
          </div>

        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Generar</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

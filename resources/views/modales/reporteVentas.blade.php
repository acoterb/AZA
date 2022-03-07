<div class="modal fade" id="auxiliarEmpeno" tabindex="-1" role="dialog" aria-labelledby="auxiliarEmpeno" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="auxiliarEmpeno">Reporte de ventas fecha especifica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  action="{{route('reportaDia')}}" method="GET" target="_black">
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label text-primary">Fecha</label>
            <div class="col-4">
              <input class="form-control" type="date" id="fecha" name="fecha" required>
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

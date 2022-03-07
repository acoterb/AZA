<table style="font-size: 14px;">
  <tr>
    <th style="position: absolute;left: 80%; top: 16%"><b>{{$contrato->poliza}}</b></th>
    <th style="position: absolute;left: 18%; top: 16%"><b>{{ date("d/m/Y", strtotime($contrato->created_at))}}</b></th>
    <th style="position: absolute;left: 3%; top: 28%"><b>{{$contrato->contrato->nombres}} {{$contrato->contrato->apellidos}}</b></th>
    <th></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 3%;top: 34%;"><b>{{$direccion->calle}}</b></td>
    <th style="position: absolute;left: 14%;top: 50%"><b>{{$contrato->contrato->telefono}}</b></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 16%;top: 37%"><b>{{$direccion->cruzes}}</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 14%;top: 40.5%;"><b>{{$direccion->colonia}}</b></td>
  	<th style="position: absolute;left: 14%; top: 43.8%"><b>{{$direccion->ciudad}}</b></th>
    <th style="position: absolute;left: 14%; top: 46.8%"><b>{{$direccion->estado}}</b></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 22%;top: 53%;"><b>{{$contrato->contrato->telefono_emergencia}}</b></td>
  </tr>


  <tr>
    <td style="position: absolute;left: 62%;top: 23%;"><b>{{$vehiculo->marca}}</b></td>
    <td style="position: absolute;left: 66%;top: 26%;"><b>{{$vehiculo->submarca}}</b></td>
    <td style="position: absolute;left: 62%;top: 29.8%;"><b>{{$vehiculo->tipo}}</b></td>
    <td style="position: absolute;left: 64%;top: 33%;"><b>{{$vehiculo->modelo}}</b></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 64%;top: 36%;"><b>{{$vehiculo->servicio}}</b></td>
    <td style="position: absolute;left: 64%;top: 39.7%;"><b>{{$vehiculo->color}}</b></td>
    <td style="position: absolute;left: 64%;top: 43%;"><b>{{$vehiculo->placas}}</b></td>
    <td style="position: absolute;left: 64%;top: 46%;"><b>{{$vehiculo->estado}}</b></td>
  </tr>
   <tr>
    <td style="position: absolute;left: 66%;top: 49.7%;"><b>{{$vehiculo->nserie}}</b></td>
    <td style="position: absolute;left: 68%;top: 53%;"><b>{{$vehiculo->nregistro}}</b></td>
    <td style="position: absolute;left: 70%;top: 56%;"><b>{{$vehiculo->nmotor}}</b></td>
    
  </tr>

    <tr>
    <td style="position: absolute;left: 25%;top: 64%;"><b>{{$pagos->costoservicio}}</b></td>
    <td style="position: absolute;left: 70%;top: 64%;"><b>{{date("d/m/Y", strtotime($pagos->pagoinicial))}}</b></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 14%;top: 74%;"><b>{{$contrato->plazo}} AÑOS</b></td>
    <td style="position: absolute;left: 50%;top: 74%;"><b>{{ date("d/m/Y", strtotime($contrato->desde))}}</b></td>
    <td style="position: absolute;left: 78%;top: 74%;"><b>{{ date("d/m/Y", strtotime($contrato->hasta))}}</b></td>
  </tr>
</table>


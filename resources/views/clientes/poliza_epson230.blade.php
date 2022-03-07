<table style="font-size: 14px;">
  <tr>
    <th style="position: absolute;left: 70%; top: 19%"><b>{{$contrato->poliza}}</b></th>
    <th style="position: absolute;left: 15%; top: 24%"><b>{{$contrato->contrato->nombres}} {{$contrato->contrato->apellidos}}</b></th>
    <th></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 15%;top: 26.5%;"><b>{{$direccion->calle}}</b></td>
    <th style="position: absolute;left: 76%;top: 26.5%"><b>{{$contrato->contrato->telefono}}</b></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 17%;top: 29%"><b>{{$direccion->cruzes}}</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 15%;top: 31.5%;"><b>{{$direccion->colonia}}</b></td>
  	<th style="position: absolute;left: 48%; top: 31.5%"><b>{{$direccion->ciudad}}</b></th>
    <th style="position: absolute;left: 78%; top: 31.5%"><b>{{$direccion->estado}}</b></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 15%;top: 33%;"><b>{{$contrato->observaciones}}</b></td>
    <td style="position: absolute;left: 75%;top: 33%;"><b>{{$contrato->contrato->telefono_emergencia}}</b></td>
  </tr>


  <tr>
    <td style="position: absolute;left: 16%;top: 43.5%;"><b>{{$vehiculo->marca}}</b></td>
    <td style="position: absolute;left: 38%;top: 43.5%;"><b>{{$vehiculo->submarca}}</b></td>
    <td style="position: absolute;left: 63%;top: 43.5%;"><b>{{$vehiculo->tipo}}</b></td>
    <td style="position: absolute;left: 82%;top: 43.5%;"><b>{{$vehiculo->modelo}}</b></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 18%;top: 46%;"><b>{{$vehiculo->servicio}}</b></td>
    <td style="position: absolute;left: 36%;top: 46%;"><b>{{$vehiculo->color}}</b></td>
    <td style="position: absolute;left: 62%;top: 46%;"><b>{{$vehiculo->placas}}</b></td>
    <td style="position: absolute;left: 80%;top: 46%;"><b>{{$vehiculo->estado}}</b></td>
  </tr>
   <tr>
    <td style="position: absolute;left: 18%;top: 49%;"><b>{{$vehiculo->nserie}}</b></td>
    <td style="position: absolute;left: 55%;top: 49%;"><b>{{$vehiculo->nregistro}}</b></td>
    <td style="position: absolute;left: 82%;top: 49%;"><b>{{$vehiculo->nmotor}}</b></td>
    
  </tr>
    <tr>
    <td style="position: absolute;left: 18%;top: 57.5%;"><b>{{$licencia->nlicencia}}</b></td>
    <td style="position: absolute;left: 35%;top: 57.5%;"><b>{{$licencia->clase}}</b></td>
    <td style="position: absolute;left: 62%;top: 57.5%;"><b>{{$licencia->expira}}</b></td>
    <td style="position: absolute;left: 82%;top: 57.5%;"><b>{{$licencia->estado}}</b></td>
  </tr>
    <tr>
    <td style="position: absolute;left: 22%;top: 67%;"><b>{{$pagos->costoservicio}}</b></td>
    <td style="position: absolute;left: 56%;top: 67%;"><b>{{date("d/m/Y", strtotime($pagos->pagoinicial))}}</b></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 15%;top: 79.5%;"><b>{{$contrato->plazo}} AÑOS</b></td>
    <td style="position: absolute;left: 40%;top: 79.5%;"><b>{{ date("d/m/Y", strtotime($contrato->desde))}}</b></td>
    <td style="position: absolute;left: 75%;top: 79.5%;"><b>{{ date("d/m/Y", strtotime($contrato->hasta))}}</b></td>
  </tr>
</table>


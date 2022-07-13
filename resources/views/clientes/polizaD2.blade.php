 <?php
            setlocale(LC_MONETARY, 'es_MX');
?>

<table style="font-size: 14px;">
  <tr>
    <th style="position: absolute;left: 35%; top: 17.8%"><b>{{$contrato->poliza}}</b></th>
    <th style="position: absolute;left: 12%; top: 21%"><b>{{$contrato->contrato->nombres}} {{$contrato->contrato->apellidos}}</b></th>
    <th></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 14%;top: 24%;"><b>{{$direccion->calle}}</b></td>
    <th style="position: absolute;left: 77%;top: 24%"><b>{{$contrato->contrato->telefono}}</b></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 17%;top: 27%"><b>{{$direccion->cruzes}}</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 14%;top: 30%;"><b>{{$direccion->colonia}}</b></td>
  	<th style="position: absolute;left: 50%; top: 30%"><b>{{$direccion->ciudad}}</b></th>
    <th style="position: absolute;left: 77%; top: 30%"><b>{{$direccion->estado}}</b></th>
  </tr>
  <tr>
    <td style="position: absolute;left: 80%;top: 33%;"><b>{{$contrato->contrato->telefono_emergencia}}</b></td>
  </tr>


  <tr>
    <td style="position: absolute;left: 12%;top: 41%;"><b>{{$vehiculo->marca}}</b></td>
    <td style="position: absolute;left: 40%;top: 41%;"><b>{{$vehiculo->submarca}}</b></td>
    <td style="position: absolute;left: 64%;top: 41%;"><b>{{$vehiculo->tipo}}</b></td>
    <td style="position: absolute;left: 85%;top: 41%;"><b>{{$vehiculo->modelo}}</b></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 12%;top: 43.8%;"><b>{{$vehiculo->servicio}}</b></td>
    <td style="position: absolute;left: 35%;top: 43.8%;"><b>{{$vehiculo->color}}</b></td>
    <td style="position: absolute;left: 64%;top: 43.8%;"><b>{{$vehiculo->placas}}</b></td>
    <td style="position: absolute;left: 82%;top: 43.8%;"><b>{{$vehiculo->estado}}</b></td>
  </tr>
   <tr>
    <td style="position: absolute;left: 16%;top: 46.2%;"><b>{{$vehiculo->nserie}}</b></td>
    <td style="position: absolute;left: 60%;top: 46.2%;"><b>{{$vehiculo->nregistro}}</b></td>
    <td style="position: absolute;left: 82%;top: 46.2%;"><b>{{$vehiculo->nmotor}}</b></td>
    
  </tr>

    <tr>
    <td style="position: absolute;left: 24%;top: 55%;"><b>{{money_format('%n', $pagos->costoservicio)}}</b></td>
    @if($contrato->plazo == '0.1')
      <td style="position: absolute;left: 52%;top: 55%;"><b>{{date("d/m/Y", strtotime($contrato->desde))}}</b></td>
    @else
    <td style="position: absolute;left: 52%;top: 55%;"><b>{{date("d/m/Y", strtotime($pagos->pagoinicial))}}</b></td>
    @endif
    <td style="position: absolute;left: 84%;top: 55%;"><b>{{$pagos->forma_pago}}</b></td>
    
    <td style="position: absolute;left: 35%;top: 58%;"><b>@if($pagos->numeropagos == 4)4 pagos de $870 @elseif($pagos->numeropagos == 1) 1 pago de $3,480 @elseif($pagos->numeropagos == 3) 3 pagos de $1,160  @else @endif</b></td>
  </tr>
  <tr>
    <td style="position: absolute;left: 14%;top: 89%;"><b>@if($contrato->plazo == '0.5')6 MESES @elseif($contrato->plazo == '0.1')1 MES @else {{$contrato->plazo}} AÑOS @endif</b></td>
    <td style="position: absolute;left: 45%;top: 89%;"><b>{{ date("d/m/Y", strtotime($contrato->desde))}}</b></td>
    <td style="position: absolute;left: 78%;top: 89%;"><b>{{ date("d/m/Y", strtotime($contrato->hasta))}}</b></td>
  </tr>
</table>


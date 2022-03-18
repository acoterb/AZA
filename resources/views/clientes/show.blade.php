

<table style="font-size: 10px;">
  <tr>
      {{--
    <th style="position: absolute;left: 12.5%; top: 1.8%">{{$contrato->poliza}}</th>
    <th style="position: absolute;left: 50%; top: 1.8%">{{$contrato->hasta}}</th>
    <th style="position: absolute;left: 85%; top: 1.8%">{{$pagos->costoservicio}}</th>
    --}}
    <th style="position: absolute;left: 17%; top: 21.3%">{{$contrato->contrato->nombres}} {{$contrato->contrato->apellidos}}</th>
    <th></th>
    <th style="position: absolute;left: 82%;top: 21%">{{$contrato->contrato->telefono}}</th>
  </tr>
  <tr>
    <td style="position: absolute;left: 18%;top: 22.9%;">{{$direccion->calle}}</td>
    <td></td>
    <td style="position: absolute;left: 82%;top: 22.5%;">{{$direccion->colonia}}</td>
  </tr>
  <tr>
    <td style="position: absolute;left: 20%;top: 24.2%">{{$direccion->cruzes}}</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  	<th style="position: absolute;left: 20%; top: 26%">{{$direccion->ciudad}}, {{$direccion->estado}}</th>
  	<th style="position: absolute;left: 82%; top: 25.5%">{{$contrato->contrato->telefono_emergencia}}</th>
  </tr>
</table>





							

							    



							                
							                                                               
							             					              
							           
                
                                                                                                                     
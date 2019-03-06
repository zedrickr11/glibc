<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TARJETAS DE CALIFICACIONES</title>
    <style media="screen">
    .texto-vertical-2 {
      writing-mode: vertical-lr;
      transform: rotate(270deg);
      font-size: 15px;

    }
    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        font-size: 0.875rem;
        font-weight: normal;
        line-height: 1.5;
        color: #151b1e;
    }
    .table {
        display: table;
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border-collapse: collapse;
    }
    .table-bordered {
        border: 1px solid #c2cfd6;
    }
    thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
    }
    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }
    .table th, .table td {
        padding: 0.20rem;
        vertical-align: top;
        border-top: 1px solid #c2cfd6;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #c2cfd6;
    }
    .table-bordered thead th, .table-bordered thead td {
        border-bottom-width: 2px;
    }
    .table-bordered th, .table-bordered td {
        border: 1px solid #c2cfd6;
    }
    th, td {
        display: table-cell;
        vertical-align: inherit;
        font-size: 13px;
    }
    th {
        font-weight: bold;
        text-align: -internal-center;
        text-align: left;
    }
    tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }
    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }
    #logo{
        align: center;

    }
    #imagen{
        width: 100px;
        height: 100px;
    }


    #firmas{
      font-size: 12px;
    }
    #datos{
      font-size: 10px;
    }

    #gris{
      background-color: #e6e6e6;
       font-weight: bold;
    }
    </style>
  </head>
  <body>
    @php($contador = 0)
    @php($cont = 0)
    @php($suma=0)
    @foreach($inscripcion_info as $ins)
    <table  class="table table-bordered table-striped table-sm" style="width:100%; border:1px solid; table-layout:fixed;word-wrap:break-word;">


			<tr >
				<td style="height:0.5px;" id="gris"  colspan="2"  align="center"><div id="firmas">

        <strong>FIRMA DE LOS PADRES O ENCARGADOS</strong></div>  </td>

        <td style="height:0.5px;" colspan="2" rowspan="6" ><div id="datos" align="center">

        <strong>COLEGIO CRISTIANO <br>
        HISPANOAMERICANO <br>
        SALCAJÁ, QUETZALTENANGO</strong> <br>  <br>
        <div id="logo">
            <img src="{{public_path('vendors/img/logo-individual.jpeg')}}" id="imagen" alt="">
        </div>
        <br>
        5a. Av 3-45 zona 2, Salcajá, Quetzaltenango.<br>
        Tels.: 5128-3481 / 7768-7414 / 7768-8211 <br>

      <strong>TARJETA DE CALIFICACIONES</strong>
        <br>
        <strong>Nombre del (la) Estudiante:</strong> {{$ins->primer_apellido}} {{$ins->segundo_apellido}}, {{$ins->primer_nombre}} {{$ins->segundo_nombre}}<br>
        <strong>Nombre del Encargado (a):</strong> {{$ins->apellidos}},{{ $ins->nombres }}<br>
        <strong>Grado:</strong> {{$grado->nombre}} {{$grado->seccionAsignada->nombre}} {{$grado->carrera->jornada->nombre}} <br>
        <strong>Nivel:</strong> {{$grado->carrera->nombre}} <strong>Teléfono:</strong> {{ $ins->telefono }}<br>
        <strong>Dirección:</strong> {{ $ins->direccion }}<br>
        <strong>Ciclo Escolar:</strong> {{ $ins->ciclo_ano }}<br>
        <br>
        El principio de la sabiduría es el Temor a Jehová.
        </div></td>
			</tr>
			<tr>
				<td colspan="2"><div id="firmas">

        PRIMERA UNIDAD: <br>Firma:__________________</div> </td>


			</tr>
      <tr>
        <td colspan="2" id="firmas">SEGUNDA UNIDAD: <br>Firma:__________________ </td>
      </tr>
      <tr>
        <td colspan="2" id="firmas">TERCERA UNIDAD: <br>Firma:__________________ </td>
      </tr>
      <tr>
        <td colspan="2" id="firmas">CUARTA UNIDAD: <br>Firma:__________________ </td>
      </tr>
      <tr>
        <td colspan="2" id="firmas">QUINTA UNIDAD: <br>Firma:__________________ </td>
      </tr>

		</table>
    <table class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th style="width: 4%; height: 70px;">#</th>
            <th style="width: 15%; height: 70px;">Curso</th>

            @foreach ($unidades as $unidad)
              <th style="width: 4%; height: 70px;" ><p class="texto-vertical-2">{{$unidad->nombre}}</p></th>
              @php($cont++)
            @endforeach

            <th style="width: 4%; height: 70px;" ><p class="texto-vertical-2">Promedio <br> Final</p></th>

            <th style="width: 4%; height: 70px;" ><p class="texto-vertical-2">Nota <br> Final</p></th>


        </tr>
    </thead>
    <tbody>

      @foreach ($materia as $m)

    <tr>

      @php($contador++)
      <td>{{$contador}}</td>
      <td>{{ $m->nombre }}</td>
      @foreach($notas as $nota)

          @if($nota->id_curso == $m->id_curso && $nota->id_alumno == $ins->id_inscripcion)
          <td>{{$nota->notaf}}</td>
          @endif

      @endforeach
      @foreach ($sumafinal as $sf)
        @if ($sf->id_alumno == $ins->id_inscripcion && $sf->id_curso==$m->id_curso)
          <td>{{$sf->notaf/$cont}}</td>

        @endif
      @endforeach

      <td>0</td>


    </tr>

  @endforeach

    </tbody>
    </table>
    @php($contador=0)
    @php($cont=0)
  @endforeach
  </body>
</html>

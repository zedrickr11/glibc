<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cuadro Final de Registro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
        .texto-vertical-2 {
          writing-mode: vertical-lr;
          transform: rotate(270deg);
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
        /*.table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }*/
        .izquierda{
            float:left;
        }
        .derecha{
            float:right;
        }
        .encabezado{
            justify-content: center;
            text-align: center;
        }

        #logo{
            float: left;
            margin-top: 1%;
            margin-left: 2%;
            margin-right: 2%;
        }

        #imagen{
            width: 100px;
            height: 100px;
        }

        #datos{
            position: relative;
            margin-top: 0%;
            margin-left: 10%;
            margin-right: 2%;
        /*text-align: justify;*/
        }

        #encabezado{
            text-align: center;
            margin-left: 10%;
            margin-right: 30%;
            font-size: 15px;
        }

        #hispano{
            font-size: 18px;
        }

        #leyenda{
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-size: 10px;
        }
        #gris{
          background-color: #e6e6e6;
           font-weight: bold;
        }
  </style>
</head>
<body>

    <header>
        <div id="logo">
            <img src="{{public_path('vendors/img/logo-individual.jpeg')}}" id="imagen" alt="">
        </div>
        <div id="datos">
            <p id="encabezado">
               <span id="hispano"> <strong>COLEGIO CRISTIANO HISPANOAMERICANO</strong></span>
               <br> <span id="leyenda"> CREEMOS, CONFIAMOS Y SERVIMOS A DIOS </span>
               <br> CUADRO FINAL DE REGISTRO <br>
               {{ $unidades->nombre }} -
               &nbsp;{{$grado->carrera->nombre}} {{$grado->seccionAsignada->nombre}} {{$grado->carrera->jornada->nombre}}
            </p>
        </div>
    </header>

      <section>
        <div>
            <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th style="width: 4%; height: 70px;">#</th>
                    <th style="width: 20%; height: 70px;">Alumno</th>
                    @php($cont=0)
                    @foreach ($materia as $m)
                      @foreach ($curso as $id)
                        @if ($m->id_curso==$id)
                          <th style="width: 4%; height: 70px;" ><p class="texto-vertical-2">{{ str_limit($m->nombre, $limit = 4, $end = '') }}</p></th>
                            @php($cont++)
                        @endif

                      @endforeach

                    @endforeach

                    <th style="width: 4%; height: 70px;" ><p class="texto-vertical-2">Prom</p></th>


                </tr>
            </thead>
            <tbody>
            @php($contador = 0)
            @foreach($inscripcion_info as $ins)
            <tr>
                @php($contador++)
                <td>{{$contador}}</td>
                <td>{{$ins->primer_apellido}} {{$ins->segundo_apellido}} {{$ins->primer_nombre}} {{$ins->segundo_nombre}} </td>

                @foreach($notas as $nota)
                @foreach($materia as $ma)
                    @if($nota->id_curso == $ma->id_curso && $nota->id_alumno == $ins->id_inscripcion)
                    <td>{{$nota->notaf}}</td>
                    @endif
                @endforeach
                @endforeach
                @foreach ($sumafinal as $sf)
                  @if ($sf->id_alumno == $ins->id_inscripcion)
                    <td>{{number_format($sf->notaf/$cont, 2, '.', '')}}</td>

                  @endif
                @endforeach
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
      </section>
</body>
</html>

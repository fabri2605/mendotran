    <img src="{{ $message->embed("http://190.15.205.234:25080/images/logo-chico.png") }}">
    <h3 style="font-weight: normal">Señor/a <b> 
        {{ ($actual->nombre.' '.$actual->apellido) }}
        </b></h3>
        <p>Usted ha solicitado un Turno en el sistema de Licencia de Conducir de la Municipalidad de Las Heras</p>
        <p>Su código de Turno es: <b style="font-size: 18px">{{$actual->nro_turno}}</b>  </p>
        <br>
        <table border="0">
            <tr>
                <td><b>Fecha de Turno:</b></td>
                <td>{{\Carbon\Carbon::parse($actual->fecha_turno)->format('d/m/Y')}}</b></td>
            </tr>
            <tr>
                <td><b>Horario de Turno:</b></td>
                <td>{{$actual->hora_turno}}</b></td>
            </tr>
            <tr>
                <td><b>Tipo de Trámite:</b></td>
                <td>{{$actual->tipo_tramite->denominacion}}</td>
            </tr>
        </table>
        <hr>
        <p>Recuerde que debe cumplir con los siguientes requisitos</p>
        <p>{!! $actual->tipo_tramite->requisitos !!}</p>
        <hr>
        <p>IMPORTANTE: Pasada la Fecha del Turno del turno este será dado de baja automáticamente</p>
        <hr>
        <br/>
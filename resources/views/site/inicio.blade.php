@extends('layouts.web')
@section('titulo')
<title> MendoTran </title>
@endsection
@section('contenido')

@php
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $fecha = \Carbon\Carbon::now();
    $mes = $meses[($fecha->format('n')) - 1];
    $mostrar = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

@endphp
<div class="container-fluid block-content" style="background: #EDEDED !important">
        <!--<a class="hidden-xs btn" onclick="redirectSube()"><img class="center" src="/images/sube-boton.png" ></a>
        <a><img class="center visible-xs-block" src="/images/sube-movil.png" onclick="redirectSube()"></a>
        <br><br>!-->
        <div class="col-sm-12 posts  hidden-xs" >
                <div class="small-posts card-news">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="post-info">
                            <span>{{ $mostrar }}</span>
                            <span>Novedades</span>
                        </div>
                        @isset($lastest)
                            <img src="{{$lastest->imagen}}" alt="Img">
                            <h1 style="padding : 5px">{{$lastest->titulo}}</h1>
                            <div class="post-content">
                                <p style="font-size: 1.5rem">
                                    
                                </p>
                            </div>
                        @endisset
                        @if($lastest->url != '#')
                            <a href="{{route('site.actualizaciones')}}" class="btn btn-success btn-default read-more">Leer más</a>
                        @endif
                    </div>
                    
                </div>
            </div>
</div>
<hr>
<div class="container-fluid block-content" style="background: #EDEDED !important">
    <div class="hgroup text-left wow zoomInUp" data-wow-delay="0.3s">
        <h1 style="color: #45A041">&nbsp;Recorridos</h1>
    </div>
    <div class="row our-services styled" style="width: 90%; margin: 0 auto;">
        <div class="col-sm-6 wow zoomInLeft" data-wow-delay="0.3s">
            <a onclick="redirectCuandoSube()">
                <span><img src="/images/sites/buttons/cuando_sube.png"></span>
                <h4>Cuándo Subo?</h4>
                <p>Consultá los arribos de las líneas por paradas</p>
            </a>
        </div>
        <div class="col-sm-6 wow zoomInLeft" data-wow-delay="0.3s">
            <a onclick="redirect()">
                <span><img src="/images/sites/buttons/como-llegar.png"></span>
                <h4>Cómo llegar con  Google Maps</h4>
                <p>Consultá las opciones de lineas de colectivo y trasbordo para llegar a tu destino</p>
            </a>
        </div>
        <div class="col-sm-6 wow zoomInLeft" data-wow-delay="0.3s">
                <a href="{{route('site.eventos_provinciales')}}">
                <span><img src="/images/sites/buttons/eventos-provinciales.png"></span>
                <h4>Eventos Provinciales</h4>
                <p>Consultá los eventos de la provincia y conocé las lineas de colectivo para llegar a tu destino</p>
            </a>
        </div>
        <div class="col-sm-6 wow zoomInLeft" data-wow-delay="0.3s">
                <a href="{{route('site.hospitales')}}">
                <span><img src="/images/new/centros.png"></span>
                <h4>Centros Asistenciales</h4>
                <p>Conocé que líneas de colectivo te llevan hasta los centros de asistencia de la provincia</p>
            </a>
        </div>
        <div class="col-sm-6 wow zoomInRight" data-wow-delay="0.3s">
            <a href="{{route('site.municipios')}}">
                <span><img src="/images/new/municipio.png"></span>
                <h4>Centros Municipales</h4>
                <p>Conocé que líneas de colectivo te llevan hasta los centros municipales de tu localidad</p>
            </a>
        </div>
        <div class="col-sm-6 wow zoomInLeft" data-wow-delay="0.3s">
            <a href="{{route('site.escuelas')}}">
                <span><img src="/images/new/escuela.png"></span>
                <h4>Centros Educativos</h4>
                <p>Conocé que líneas de colectivo te llevan hasta tu escuela, colegio o universidad</p>
            </a>
        </div>
        <div class="col-sm-6 wow zoomInRight" data-wow-delay="0.3s">
            <a href="{{route('site.mendotran')}}">
                <span><img src="/images/new/ubicacion.png"></span>
                <h4>Cercanos a mi ubicación</h4>
                <p>Visualiza el trazado de los recorridos vigentes y conocé los cercanos a tu ubicación</p>
            </a>
        </div>
    </div>
</div>
<hr>
{{-- <div class="container-fluid block-content" style="background: #EDEDED !important">
    <div class="hgroup text-left wow zoomInUp" data-wow-delay="0.3s">
            <h1 style="color: #45A041;">&nbsp;Red Bus</h1>
    </div>
    <div class="row our-services styled" style="width: 90%; margin: 0 auto;">
        <div class="col-sm-4 wow zoomInLeft" data-wow-delay="0.3s">
            <a href="http://www.miredbus.com.ar/consultaSaldo.htm" target="_blank">
                <span class="lnk-interes"><img src="/images/sites/buttons/mi-saldo.png"></span>
                <h4>Mi Saldo</h4>
                <p>Consultá el saldo de tu tarjeta Red Bus antes de tomar el colectivo</p>
            </a>
        </div>
        <div class="col-sm-4 wow zoomInRight" data-wow-delay="0.3s">
            <a href="{{route('site.cargar')}}">
                <span class="lnk-interes"><img src="/images/sites/buttons/donde-cargo.png"></span>
                <h4>Dónde Cargo?</h4>
                <p>Conocé todos los puntos de carga de tu Red Bus más cercanos</p>
            </a>
        </div>
        <div class="col-sm-4 wow zoomInLeft" data-wow-delay="0.3s">
            <a href="{{route('site.cargavirtual')}}">
                <span class="lnk-interes"><img src="/images/sites/buttons/carga-virtual.png"></span>
                <h4>Carga Virtual</h4>
                <p>Recargá tu Red Bus desde homebanking</p>
            </a>
        </div>
    </div>
</div> --}}
<hr>
@endsection
@section('scripts')
    <script src="js/waitingfor.js"></script>
    <script src="js/common.js"></script>
    <script src="/js/polyline.js"></script>
    <script>
        function redirectCuandoSube(){
            window.open('https://mendotran.oba.visionblo.com','_blank');
        }
        function redirect(){
            //console.log(polyline.toGeoJSON('nffhEzoccLEGH}@PgBVoCDMLCVNbA|@jBvA`AX`@YJo@i@cB{@eBy@o@kFqAcOiDyBvNmIq@aGg@SQDeBIg@{MgCkDaAoCu@wHuB_ReFBeTc@k@}CcBuIsDiM_GGw@LaFBsDkBs@}DuAuEeBwMeF_EmBcGp]mFja@Mp@W\\mDUG?iJ]yPkE{L}EaT_KsNaFqIwAqO_AgJPgFU}CYwAJmISwDCoEy@{GaBwE}AeGmAuGyBiHaCwEgA?CsLwAqYkCqHIeEYA?{Cc@mBo@]ZD~Fl@zCNnPFhE]zJHbE}@~FH`DO~EObESpBo@|@eAWgBiAiCiB_DoBSg@_@eA?A}@G{@`A]tA@tAmAb@sDOsFIiN_@uWg@QrLW`YvB`@aA|IeAtK`ZbFdSdDbLlB~SrDd@qW]INgPd@wG`AuId@{DT}A[aAo@k@y@s@i@qAdAyKr@_HTeAl@iAVkACkQn@cE[q@WwENwEZ}EVwA|@gA~@UzD[zDN~Gl@rE\\dETdBRzATzANvAN`A@`ANvB\\fB`@xDdAdDpAzAh@~DpAdInCp@VvAp@|@f@lAp@d@LjFfAzH~@jH`@rAEjE]rHOdSGxHdAfL|CxUjKtPfGhRjGjFb@hG|@dC_@xAoNfDcV`Fq]`LjE|FxB`GxB|EjBE~BOzHZp@nIvD~FnCbHrChAf@@nUxRhFjRjF~M|BAvCbOlAXaDvA}IdIdBbIjBfE`A`BdBx@hCGh@[L{@e@AAeBmA_AeAACc@EUfA_@zDOdB\\H'));
            window.open('https://www.google.com/maps/dir///@-32.8860868,-68.8431115,13z/data=!4m2!4m1!3e3','_blank');
        }
        function redirectApp(){
            window.open('https://play.google.com/store/apps/details?id=com.ar.mendotran.MendoTran','_blank');
        }
        function redirectSube(){
            //console.log(polyline.toGeoJSON('nffhEzoccLEGH}@PgBVoCDMLCVNbA|@jBvA`AX`@YJo@i@cB{@eBy@o@kFqAcOiDyBvNmIq@aGg@SQDeBIg@{MgCkDaAoCu@wHuB_ReFBeTc@k@}CcBuIsDiM_GGw@LaFBsDkBs@}DuAuEeBwMeF_EmBcGp]mFja@Mp@W\\mDUG?iJ]yPkE{L}EaT_KsNaFqIwAqO_AgJPgFU}CYwAJmISwDCoEy@{GaBwE}AeGmAuGyBiHaCwEgA?CsLwAqYkCqHIeEYA?{Cc@mBo@]ZD~Fl@zCNnPFhE]zJHbE}@~FH`DO~EObESpBo@|@eAWgBiAiCiB_DoBSg@_@eA?A}@G{@`A]tA@tAmAb@sDOsFIiN_@uWg@QrLW`YvB`@aA|IeAtK`ZbFdSdDbLlB~SrDd@qW]INgPd@wG`AuId@{DT}A[aAo@k@y@s@i@qAdAyKr@_HTeAl@iAVkACkQn@cE[q@WwENwEZ}EVwA|@gA~@UzD[zDN~Gl@rE\\dETdBRzATzANvAN`A@`ANvB\\fB`@xDdAdDpAzAh@~DpAdInCp@VvAp@|@f@lAp@d@LjFfAzH~@jH`@rAEjE]rHOdSGxHdAfL|CxUjKtPfGhRjGjFb@hG|@dC_@xAoNfDcV`Fq]`LjE|FxB`GxB|EjBE~BOzHZp@nIvD~FnCbHrChAf@@nUxRhFjRjF~M|BAvCbOlAXaDvA}IdIdBbIjBfE`A`BdBx@hCGh@[L{@e@AAeBmA_AeAACc@EUfA_@zDOdB\\H'));
            window.open('http://sube.mendotran.com.ar','_blank');
        }
    </script>     
@endsection

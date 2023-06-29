@extends('layouts.web')
@section('titulo')
<title> Preguntas Frecuentes </title>
@endsection
@section('contenido')
<br/><br/>
<div class="container-fluid block-content" style="background: #EDEDED !important">
        <section >
                <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="panel-group questions-container" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="panel-heading faq-header" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseIntermodal" aria-expanded="false" aria-controls="collapseOne">
                                        <span>¿Qué es Intermodal?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseIntermodal" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p class="faq"> 
                                        Hace referencia a los distintos modos que el usuario tiene para moverse en el área metropolitana.
                                        <p>
                                            <img src="/images/faq/metro.png"/>
                                            <img src="/images/faq/bondi.png"/>
                                            <img src="/images/faq/trole.png"/>
                                            <img src="/images/faq/bici.png"/>
                                            <img src="/images/faq/caminar.png"/>
                                        </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="panel-heading faq-header" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span>¿Cómo identifico los nuevos recorridos?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p class="faq"> 
                                        Todas las unidades tendrán el mismo color (rojo de metrotranvía), y un círculo de color impreso en la parte frontal posterior y lateral del colectivo que identifica las distintas líneas de cierta área geográfica de cobertura, y que a su vez se corresponde con un grupo u operador concesionado determinado.

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="panel-heading faq-header" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>¿Dónde puedo consultar nuevos recorridos y combinaciones de transporte?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <p class="faq">
                                        En paradas con refugio; en los CAU (Centros de Atención al Usuario) ubicados en cada control de línea; en la web y aplicación móvil mendoTRAN.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="panel-heading faq-header" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                        <span>¿Dónde puedo consultar los horarios de mi línea de colectivo?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <p class="faq">
                                        En la aplicación móvil mendoTRAN y en <a href="http://www.mendotran.com.ar">www.mendotran.com.ar</a> .
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="panel-heading faq-header" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <span>¿Qué es un “troncal”?</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <p class="faq">
                                            Es un servicio de alta frecuencia y regularidad horaria. El principal objetivo es vincular departamentos. Circularan por carriles especiales.
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="panel-heading faq-header" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseInterdepartamental" aria-expanded="false" aria-controls="collapseFive">
                                            <span>¿Qué es un servicio interdepartamental?</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseInterdepartamental" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <p class="faq">
                                            Existen tres categorías:<br/>
                                            Categoría 1: vinculan departamentos pasando o atravesando la Ciudad sin pisar la zona del microcentro (diametral o externos). <br/>
                                            Categoría 2: vinculan departamentos con la Ciudad (radial).<br/>
                                            Categoría 3: vinculan departamentos sin pasar por la Ciudad.<br/>
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="panel-heading faq-header" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseLocal" aria-expanded="false" aria-controls="collapseFive">
                                            <span>¿Qué es un servicio local?</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseLocal" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <p class="faq">
                                            Vincula zonas dentro del departamento. Y en algunos casos puede vincularse con los troncales o interdepartamentales.
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="panel-heading faq-header" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDiferencial" aria-expanded="false" aria-controls="collapseFive">
                                            <span>¿Qué es un servicio diferencial?</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseDiferencial" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <p class="faq">
                                                Servicios con pocas paradas entre el punto de origen y el destino final. Es más directo.
                                            </p>
                                    </div>
                                </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="panel-heading faq-header" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTrasbordo" aria-expanded="false" aria-controls="collapseFive">
                                            <span>¿Qué es Trasbordo?</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTrasbordo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <p class="faq">
                                                Es la posibilidad de combinar recorridos entre los diferentes modos de movilidad urbana.
                                                El tiempo en el que se pueden realizar los trasbordos es de 90 minutos, a partir del primer pasaje.
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="panel-heading faq-header" role="tab" id="headingSix">
                                    <h4 class="panel-title">
                                        <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            <span>¿Dónde puedo realizar una consulta o sugerencia sobre el servicio?</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                    <div class="panel-body">
                                        <p class="faq">
                                                Mediante sus páginas oficiales y redes sociales.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                    <div class="panel-heading faq-header" role="tab" id="headingSeven">
                                        <h4 class="panel-title">
                                            <a class="collapsed faq-header" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                <span>¿Sigue vigente el beneficio de abonos y gratuidades?</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                                        <div class="panel-body">
                                            <p class="faq">
                                                    Sí, todos los beneficios continúan vigentes. 

                                            </p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
@endsection
@section('scripts')
<script src="js/site/donde-cargar.js">

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPK5gGqYz_-ILKoXladIpWzWU0Ab7purE&callback=initMap">
</script>
@endsection
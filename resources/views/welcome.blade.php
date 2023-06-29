@extends('layouts.app')
    @section('titulo')
        <title> MendoTran </title>
    @endsection
    @section('contenido')
        <style>
            div .row{
                cursor: pointer !important;
            }
        </style>
        <header class="active-navbar appsLand-header back-main-color" id="home">
            <div class="app-overlay bg-header-mendo" >
            </div>
        </header>
        <div id="space" style="display: none">
            <br/><br/>
        </div>
        <main class="entry-main" style="background: #EDEDED !important;">
        <section class="mini-feature section-without-title">
            <div class="container">
                <div id="mendotran" class="row" >
                    <div  onclick="openPage('mendotran')" class="col-md-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s" >
                        <div class="media mini-feature-box main-btn-mendo" >
                            <div class="pull-left min-img" >
                                <img src="images/sites/buttons/mendotran.png" />
                            </div>
                            <div class="media-body" >
                                <h3 class="media-heading">Muy pronto mendoTRAN</h3>
                                <p>Conocé los nuevos recorridos de colectivos que entrarán en vigencia a partir del próximo año y serán parte del Sistema de Transporte Intermodal de Mendoza
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="row">
                    <div id="misaldo" onclick="openPage('saldo')" class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div class="mini-feature-box main-btn-mendo" >
                            <div class="pull-left min-img" >
                                    <img src="images/sites/buttons/mi-saldo.png" />
                            </div>
                            <h3>Mi Saldo</h3>
                            <p style="text-align: left">
                                Consultá el saldo de tu tarjeta Red Bus antes de tomar el colectivo
                            </p>
                        </div>
                    </div>
                    <div onclick="openPage('dondecargar')" id="dondecargar" class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="mini-feature-box main-btn-mendo" >
                                <div class="pull-left min-img" >
                                        <img src="images/sites/buttons/donde-cargo.png" />
                                </div>
                                <h3>Dónde Cargo?</h3>
                                <p>
                                    Conocé todos los puntos de cargas  de tu Red Bus más cercanos
                                </p>
                            </div>
                        </div>
                    
                </div>
                <div  class="row">
                        <div onclick="openPage('cargavirtual')" id="misaldo" class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="mini-feature-box main-btn-mendo" >
                                <div class="pull-left min-img" >
                                        <img src="images/sites/buttons/carga-virtual.png" />
                                </div>
                                <h3>Carga Virtual</h3>
                                <p>
                                    Recargá tu tarjeta Red Bus desde tu homebanking
                                </p>
                                <br/>
                            </div>
                        </div>
                        <div onclick="openPage('desvios')" id="desvios" class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="mini-feature-box main-btn-mendo" >
                                <div class="pull-left min-img" >
                                        <img src="images/sites/buttons/desvios.png" />
                                </div>
                                <h3>Desvíos</h3>
                                <p>
                                    Consultá los desvíos por obras que pueden modificar el recorrido de tu colectivo
                                </p>
                            </div>
                        </div>
                       <!-- <div onclick="openPage('recorridos')" id="dondecargar" class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="mini-feature-box main-btn-mendo" >
                                    <div class="pull-left min-img" >
                                            <img src="images/sites/buttons/recorridos.png" />
                                    </div>
                                    <h3>Recorridos</h3>
                                    <p>
                                        Conocé los recorridos de todos los grupos y líneas vigentes.
                                    </p>
                                </div>
                            </div>!-->
                        
                    </div>
            <div  class="row">
                    <!--<div onclick="openPage('')" id="comollegar" class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div class="mini-feature-box main-btn-mendo" >
                            <div class="pull-left min-img" >
                                    <img src="images/sites/buttons/como-llegar.png" />
                            </div>
                            <h3>Cómo llegar?</h3>
                            <p>
                                Consultá la parada más cercana y que colectivo tenés que tomar para llegar a tu destino.
                            </p>
                        </div>
                    </div>!-->
                    
                    
                </div>
            <div  class="row">
                    <div onclick="openPage('faq')" id="faq" class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div class="mini-feature-box main-btn-mendo" >
                            <div class="pull-left min-img" >
                                    <img src="images/sites/buttons/faq.png" />
                            </div>
                            <h3>Preguntas Frecuentes</h3>
                            <p>
                                Conocé las respuestas a todas tus dudas
                            </p>
                        </div>
                    </div>
                    <div onclick="openPage('reclamos')" id="desvios" class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="mini-feature-box main-btn-mendo" >
                                <div class="pull-left min-img" >
                                        <img src="images/sites/buttons/reclamos.png" />
                                </div>
                                <h3>Reclamos y sugerencias</h3>
                                <p>
                                    Queremos escucharte para seguir mejorando
                                </p>
                            </div>
                        </div>
                    
                </div>
                <div  class="row">
                        <div onclick="openPage('horarios')" id="faq" class="col-md-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="mini-feature-box main-btn-mendo-green clock-winter" >
                                <div class="pull-left"  >
                                    <img  src="images/sites/buttons/horarios.png"/>
                                </div>
                                <h3 style="display: inline">Horarios de Invierno</h3>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </section>
    </main>
    @endsection
    @section('scripts')
        <script>
            function openPage(page){
                if(page == 'saldo'){
                    window.open('http://www.miredbus.com.ar/consultaSaldo.htm','_blank');
                }else{
                    location.href="/"+page;
                }
                
            }
        </script>
    @endsection
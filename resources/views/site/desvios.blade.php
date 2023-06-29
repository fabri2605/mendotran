@extends('layouts.web')
    @section('titulo')
        <title> Desvíos por Obra </title>
    @endsection
    @section('contenido')
    
        <header class="active-navbar appsLand-header" id="home" style="background: #F8E82D !important; " >
        </header>
        <br/><br/><br/>
        <main class="entry-main" style="background: #EDEDED !important;">
                <section class="mini-feature section-without-title">
                    <div class="container">
                            <div  class="row">
                                    <div id="misaldo" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div onclick="search('Grupo 1')" class="mini-feature-box men-green" style="color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                            <h3>Grupo 01</h3>
                                        </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                            <div onclick="search('Grupo 2')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                                <h3>Grupo 02</h3>
                                            </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div onclick="search('Grupo 3')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                            <h3>Grupo 03</h3>
                                        </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div onclick="search('Grupo 4')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                            <h3>Grupo 04</h3>
                                        </div>
                                    </div>
                            </div>
                            <div  class="row">
                                    <div id="misaldo" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div onclick="search('Grupo 5')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                            <h3>Grupo 05</h3>
                                        </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                            <div onclick="search('Grupo 6')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                                <h3>Grupo 06</h3>
                                            </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div onclick="search('Grupo 7')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                            <h3>Grupo 07</h3>
                                        </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div onclick="search('Grupo 8')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                            <h3>Grupo 08</h3>
                                        </div>
                                    </div>
                            </div>
                            <div  class="row">
                                    <div id="misaldo" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div onclick="search('Grupo 9')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                            <h3>Grupo 09</h3>
                                        </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                            <div onclick="search('Grupo 10')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                                <h3>Grupo 10</h3>
                                            </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div onclick="search('STM')" class="mini-feature-box men-green" style=" color: #fff !important; border-radius: 10px !important; margin-top: 0px !important; padding: 30px !important; text-align: center;">
                                            <h3>STM</h3>
                                        </div>
                                    </div>
                                    <div id="dondecargar" class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        
                                    </div>
                            </div>
                    </div>
                </section>
                <section class="blog" id="listado">
                        <div class="container">
                            <div class="list-posts" id="desvios">
                                
                            </div>
                        </div>
                </section>
                <section class="blog" id="mapa">
                        <div id="map"></div>
                </section>
        </main>
    @endsection
    @section('scripts')
        <script src="js/waitingfor.js"></script>
        <script src="js/common.js"></script>
        <script src="js/site/desvios.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAETyihFKwJRv0-K7iDqeAThfG6a4c7bA&callback=initMap"></script>
    @endsection
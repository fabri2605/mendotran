@extends('layouts.app')
@section('titulo')
<title> Recorridos </title>
@endsection
@section('contenido')
    <header class="active-navbar appsLand-header " id="home">
    </header>
    <main class="entry-main " >
            <section class="contact section-bg-img " id="search" >
                    <div class="app-overlay" style="background: #C20000 !important; " >
                        <div class="container">
                            <div class="section-title title__style-2 wow fadeInUp white-color" data-wow-duration="1s" data-wow-delay="0s">
                                <br/><br/><br/><br/><br/>
                            </div>
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="contact-form wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-push-6 col-md-push-6">
                                                            <select  class="form-control" id="lineas">
                                                            </select>
                                            </div>
                                            <div class="col-md-5 col-lg-pull-4 col-md-pull-4">
                                                        <select onchange="searchLines()" class="form-control" id="grupos">
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="btn-box" align="center" >
                                                <button style="background-color: #45A041 !important; color: #fff" type="button" name="submit_contact_form" class="appsLand-btn" onclick="getRecorrido()"><span> Buscar</span></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                <section class="blog" id="listado">
                    <div class="container">
                        <div class="list-posts" id="recorridos">
                            
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
   <!-- <script src="js/site/recorridos.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPK5gGqYz_-ILKoXladIpWzWU0Ab7purE&callback=initMap"></script>!-->
@endsection
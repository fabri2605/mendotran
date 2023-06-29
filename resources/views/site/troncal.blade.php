@extends('layouts.web')
@section('titulo')
<title> Troncales </title>
@endsection
@section('contenido')
    <br/><br/><br/><br/>
    <header class="active-navbar appsLand-header " id="home">
    </header>
    <main class="entry-main ">
            
            <!--<div id="mendotran" class="row" style="width:65% !important; margin: 0 auto !important" >
                <div onclick="download()" class="col-md-8 wow fadeInUp"  data-wow-duration="1s" data-wow-delay="0.25s" >
                    <div class="media mini-feature-box main-btn-mendo men-green" >
                        <div class="pull-left min-img" style="min-height: 20px !important; min-width: 20px !important" >
                            <i class="fa fa-cloud-download fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="media-body" >
                            <h3 class="media-heading">Descargar Archivo</h3>
                        </div>
                    </div>
                </div>
            </div>!-->
            <div class="blog section-without-title" id="blog">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <!--<form class="search-form visible-sm-block visible-xs-block">
                                    <div class="form-group">
                                        <div class="search-input-group">
                                            <input type="text" class="form-control" placeholder="Buscar ..">
                                            <button class="appsLand-btn appsLand-btn-gradient search-btn"><span><i class="fa fa-search"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>!-->
                                <article class="single-post">
                                    <figure class="entry-header wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                        <div class="post-image">
                                            <img id="img-actual" class="img-responsive" src="/files/recorridos/troncales/mapa-troncales.jpg" />
                                        </div>
                                        <ul class="entry-Categories list-unstyled list-inline">
                                            <li><a href="#"><div id="map-titulo">RECORRIDO TRONCALES</div></a></li>
                                        </ul>
                                    </figure>
                                </article>
                                <div>
                                    <button type="button" onclick="download()" class="appsLand-btn appsLand-btn-gradient"> <span><i class="fa fa-cloud"></i> Descargar</span></button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <aside class="blog-asideMenu">
                                    <!--<form class="search-form hidden-sm hidden-xs">
                                        <div class="search-input-group form-group">
                                            <input type="text" class="form-control" placeholder="Buscar ..">
                                            <button class="appsLand-btn appsLand-btn-gradient search-btn"><span><i class="fa fa-search"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>!-->
                                    <div class="aside-box">
                                        <h4>Troncales</h4>
                                        <ul class="list-unstyled categories">
                                            <li><a href="#" onclick="verMapa('troncales')">Todos </a></li>
                                            <li><a href="#" onclick="verMapa('mtm-01')">Recorrido Metrotranvia  </a></li>
                                            <li><a href="#" onclick="verMapa('110')">Recorrido 110 </a></li>
                                            <li><a href="#" onclick="verMapa('120')">Recorrido 120 </a></li>
                                            <li><a href="#" onclick="verMapa('200-201')">Recorrido 200-201 </a></li>
                                            <li><a href="#" onclick="verMapa('310')">Recorrido 310 </a></li>
                                            <li><a href="#" onclick="verMapa('313')">Recorrido 313 </a></li>
                                            <li><a href="#" onclick="verMapa('330-331')">Recorrido 330-331 </a></li>
                                            <li><a href="#" onclick="verMapa('352')">Recorrido 352 </a></li>
                                            <li><a href="#" onclick="verMapa('400')">Recorrido 400 </a></li>
                                            <li><a href="#" onclick="verMapa('522-523')">Recorrido 522-523 </a></li>
                                            <li><a href="#" onclick="verMapa('545')">Recorrido 545 </a></li>
                                            <li><a href="#" onclick="verMapa('554')">Recorrido 554 </a></li>
                                            <li><a href="#" onclick="verMapa('600')">Recorrido 600 </a></li>
                                            <li><a href="#" onclick="verMapa('601')">Recorrido 601 </a></li>
                                            <li><a href="#" onclick="verMapa('650-651')">Recorrido 650-651 </a></li>
                                            <li><a href="#" onclick="verMapa('700')">Recorrido 700 </a></li>
                                            <li><a href="#" onclick="verMapa('710')">Recorrido 710 </a></li>
                                            <li><a href="#" onclick="verMapa('720')">Recorrido 720 </a></li>
                                            <li><a href="#" onclick="verMapa('731')">Recorrido 731 </a></li>
                                            <li><a href="#" onclick="verMapa('820')">Recorrido 820 </a></li>
                                            <li><a href="#" onclick="verMapa('900')">Recorrido 900 </a></li>
                                            <li><a href="#" onclick="verMapa('810-811')">Recorrido 810-811 </a></li>
                                            <li><a href="#" onclick="verMapa('905-910')">Recorrido 905-910 </a></li>
                                            <li><a href="#" onclick="verMapa('935-940')">Recorrido 935-940 </a></li>
                                            <li><a href="#" onclick="verMapa('950-951')">Recorrido 950-951 </a></li>
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
    </main>
@endsection
@section('scripts')
        <script>
            var _actual = '/files/recorridos/troncales/mapa-troncales.jpg';
            function download(){
                window.open( _actual,'_blank');
            }
            function verMapa(img){
                console.log(img);
                _actual = '/files/recorridos/troncales/mapa-'+img+'.jpg';
                var imagen = document.getElementById('img-actual');
                var titulo = document.getElementById('map-titulo');
                imagen.src = _actual;
                titulo.innerHTML = 'RECORRIDO '+img.toUpperCase();

            }
        </script>
    @endsection
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Mendoza,Sistema,Transporte,Mendotran">
        <meta name="description" content="Transporte Intermodal de Mendoza">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('titulo')
		<link href="/sitio/css/master.css" rel="stylesheet">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
			integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
			crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
			integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
			crossorigin=""></script>
        <!--[if lt IE 9]>
          <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        .glyphicon {
            font-size: 50px;
        }
        /* this is for nav not overpassing html */
        .topmenu:before{
            width: auto;
        }
    </style>
	<body data-scrolling-animations="true" style="background-color: #EDEDED">
		<div class="sp-body">
			<!-- Loader Landing Page -->
			<div id="ip-container" class="ip-container">
				<div class="ip-header" >
					<div class="ip-loader">
						<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
							<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,39.3,10z"/>
							<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
						</svg>
					</div>
				</div>
			</div>
			<!-- Loader end -->
			<header id="this-is-top" style="background: #fff">
				<div class="container-fluid">
					<div class="topmenu row">
						<!--<nav class=" col-sm-offset-3 col-md-offset-4 col-lg-offset-4 col-sm-6 col-md-5 col-lg-5 ">
						</nav>!-->
						<nav class="text-right col-sm-3 col-md-3 col-lg-3 pull-right">
							<a href="https://www.facebook.com/SsPublicosMza/" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="https://twitter.com/sspublicosmza?lang=es" target="_blank"><i class="fa fa-twitter"></i></a>
						</nav>
					</div>
					<br/><br/>
					<div class="row header" style="background: #fff">
						<div class="col-sm-3 col-md-3 col-lg-3">
						<a href="/" id="logo"></a>
						</div>
						<div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-sm-8 col-md-8 col-lg-8 hidden-xs">
							<div class="text-right header-padding">
								<div class="h-block"><span>Línea Gratuita</span><span style="color: #45A041; font-weight: bold; font-size: 1.4rem">148 opción 7</span></div>
								<div class="h-block"><span>Asociación Unida Transporte Automotor Mendoza (AUTAM)</span><span style="color: #45A041; font-weight: bold; font-size: 1.4rem">0-800-999-6604</span></div>
								<div class="h-block"><span>Ente de Movilidad Provincial</span><span style="color: #45A041; font-weight: bold; font-size: 1.4rem">emop.com.ar</span></div>
							</div>
						</div>
                    </div>
                    <br/>
					<div id="main-menu-bg"></div>
					<a id="menu-open" href="#"><i class="fa fa-bars"></i></a>
					<nav class="main-menu navbar-main-slide">
						<ul class="nav navbar-nav navbar-main">
							<li><a href="/">Home</a></li>
							<li><a href="https://mendotran.oba.visionblo.com/" target="_blank">Cuándo Subo?</a></li>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle border-hover-color1" href="#">Grupos y Líneas <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="{{route('site.recorridos')}}">Recorridos</a></li>
									<li><a href="{{route('site.recorridos.map')}}">Mapas</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle border-hover-color1" href="#">Troncales<i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="{{route('site.troncal')}}">Mapa</a></li>
									<li><a href="{{route('site.troncal.trasbordo.lista')}}">Trasbordos</a></li>
								</ul>
							</li>
							<li><a href="{{route('site.faq')}}">FAQ</a></li>
							<li><a href="http://www.transportes.mendoza.gov.ar/consulta/" target="_blank">Reclamos</a></li>
							{{-- <li style="background: #1986BB"><a href="https://abonosube.mendoza.gov.ar/" target="_self">SUBE</a></li> --}}

							<!--<li><a class="btn_header_search" href="#"><i class="fa fa-search"></i></a></li>!-->
						</ul>
						<div class="search-form-modal transition" style="display: none">
							<form class="navbar-form header_search_form">
								<i class="fa fa-times search-form_close"></i>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Buscar">
								</div>
								<button type="submit" class="btn btn_search customBgColor">Buscar</button>
							</form>
						</div>
	                </nav>
					<a id="menu-close" href="#"><i class="fa fa-times"></i></a>
				</div>
			</header>
			@yield('contenido')

		</div>
		<br/>
		<hr>
		<footer>
			<div class="color-part"></div>
			<div class="container-fluid">
				<div class="row block-content">
					<div class="col-xs-8 col-sm-4 wow zoomIn" data-wow-delay="0.3s">
						<a href="#" class="logo-footer"></a>
						<div class="footer-icons">
							<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
							<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
						</div>
					</div>

				</div>
				<div class="copy text-right"><a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a></div>
			</div>
		</footer>

		<script src="/sitio/js/jquery-1.11.3.min.js"></script>
		<script src="/sitio/js/jquery-ui.min.js"></script>
		<script src="/sitio/js/bootstrap.min.js"></script>
		<script src="/sitio/js/modernizr.custom.js"></script>
		<script src="/sitio/assets/loader/js/classie.js"></script>
		<script src="/sitio/assets/loader/js/pathLoader.js"></script>
		<script src="/sitio/assets/loader/js/main.js"></script>
		<script src="/sitio/js/classie.js"></script>
		<script src="/sitio/assets/switcher/js/switcher.js"></script>
		<script src="/sitio/assets/owl-carousel/owl.carousel.min.js"></script>
        <script src="/sitio/assets/contact/jqBootstrapValidation.js"></script>
        <script src="/sitio/assets/contact/contact_me.js"></script>
	    <script type="text/javascript" src="/sitio/assets/isotope/jquery.isotope.min.js"></script>
		<script src="/sitio/js/jquery.smooth-scroll.js"></script>
		<script src="/sitio/js/wow.min.js"></script>
		<script src="/sitio/js/jquery.placeholder.min.js"></script>
		<script src="/sitio/js/smoothscroll.min.js"></script>
		<script src="/sitio/js/theme.js"></script>
		<script src="/sitio/js/polyline.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129822561-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-129822561-1');
            </script>
            <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
            <script>
                var OneSignal = window.OneSignal || [];
                    OneSignal.push(function() {
                        OneSignal.init({
                        appId: "2738242b-2c01-472f-a305-e050eb04bdec",
                        });
                    });
            </script>
		@yield('scripts')
		@stack('scripts')
	</body>

</html>

@extends('layouts.web')
@section('titulo')
<title> MendoTran </title>
@endsection
@section('contenido')
    <div class="container-fluid block-content" style="background: #EDEDED !important">
       
        <section class="map" id="mapa" >
                <span onclick="openNav()" class="btn" style="
                color: #fff !important;
                background-color: #C8102D !important;
                border: 1px solid #C8102D !important;">
                    <i class="glyphicon glyphicon-search" style="font-size: 1.4rem; color: white"></i>
                </span>
                <div id="menu-lateral" class="sidenav">
                    <div>
                        <a href="#" onclick="closeNav()" class="close-item" >
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div id="menu-recorrido">
                        <a href="#" onclick="loadData()" class="btn btn-default btn-block" style="background-color: #45A041 !important; color: #FFF">
                            <i class="fa fa-bus" aria-hidden="true"></i>
                            &nbsp;
                            Todos Recorridos
                        </a>
                        <a href="#" onclick="cercanos()" class="btn btn-default btn-block" style="background-color: #C20000 !important; color: #FFF">
                            <i class="fa fa-compass" aria-hidden="true"></i>
                            &nbsp;
                            Cercanos
                        </a>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" style="background-color: #C8102D; border: 1px solid #C8102D" ><i class="glyphicon glyphicon-search" style="font-size: 1.2rem; color: white"></i></span>
                            <input onkeyup="filterList()" id="search" type="text" class="form-control" name="search" placeholder="Buscar Recorrido">
                        </div>
                        <br/>
                        <div class="scrollbar scrollbar-primary">
                            <ul class="list-group side-item" id="recorridos" style="max-height: 400px; overflow: scroll; -webkit-overflow-scrolling: touch">
                            </ul>  
                        </div>
                    </div>
                </div>
                <div id="map"></div>
        </section>
</div>
@endsection
@section('scripts')
    <script>
        function openNav() {
            document.getElementById("menu-lateral").style.width = "280px";
            document.getElementById("mapa").style.marginLeft = "280px";
        }
        function closeNav() {
            document.getElementById("menu-lateral").style.width = "0";
            document.getElementById("mapa").style.marginLeft = "0";
        }
    </script>
    <script src="/js/waitingfor.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/site/mendotran.js"></script>
@endsection
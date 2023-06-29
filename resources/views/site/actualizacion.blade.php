@extends('layouts.web')
@section('titulo')
    <title> Actualizaciones de Recorridos</title>
@endsection
@section('contenido')
@php
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $fecha = \Carbon\Carbon::now();
    $mes = $meses[($fecha->format('n')) - 1];
    $mostrar = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

@endphp
<div class="container-fluid block-content" style="background: #EDEDED !important">
        <div class="row main-grid">
            <div class="col-sm-9 posts" id="lastnew">
                <div class="big-posts card-news">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="post-info">
                            <span>{{$mostrar}}</span>
                            <span>Últimas Noticia</span>
                        </div>
                        <div class="post-content" style="padding: 12px">
                            <img src={{$lastest->imagen}}><br>
                            <br>
                            <h1>{{$lastest->titulo}}</h1>
                            <p style="padding: 5px; text-align: justify; font-size: 15px !important">
                                {!! $lastest->noticia !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 posts" id="grupo200">
                @if($actualizaciones)
                    @foreach($actualizaciones as $item)
                        @if($item->grupo_id == 2)
                            <div class="big-posts card-news">
                                <div class="wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="post-info">
                                        <span>{{$item->created_at->toFormattedDateString()}}</span>
                                        <span>{{'Grupo 200'}}</span>
                                    </div>
                                    <div class="post-content" style="padding: 12px">
                                        <h1>{{'Grupo 200'}}</h1>
                                        <p style="padding: 5px; text-align: justify">
                                            {!! $item->descripcion !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                @endif
            </div>
            <div class="col-sm-9 posts" id="grupo700">
                @if($actualizaciones)
                    @foreach($actualizaciones as $item)
                        @if($item->grupo_id == 7)
                            <div class="big-posts card-news">
                                <div class="wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="post-info">
                                        <span>{{$item->created_at->toFormattedDateString()}}</span>
                                        <span>{{'Grupo 700'}}</span>
                                    </div>
                                    <div class="post-content" style="padding: 12px">
                                        <h1>{{'Grupo 700'}}</h1>
                                        <p style="padding: 5px; text-align: justify">
                                            {!! $item->descripcion !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                @endif
            </div>
            <div class="col-sm-9 posts" id="grupo800">
                @if($actualizaciones)
                    @foreach($actualizaciones as $item)
                        @if($item->grupo_id == 8)
                            <div class="big-posts card-news">
                                <div class="wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="post-info">
                                        <span>{{$item->created_at->toFormattedDateString()}}</span>
                                        <span>{{'Grupo 800'}}</span>
                                    </div>
                                    <div class="post-content" style="padding: 12px">
                                        <h1>{{'Grupo 800'}}</h1>
                                        <p style="padding: 5px; text-align: justify">
                                            {!! $item->descripcion !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                @endif
            </div>
            <div class="col-sm-9 posts" id="grupo900">
                @if($actualizaciones)
                    @foreach($actualizaciones as $item)
                        @if($item->grupo_id == 9)
                            <div class="big-posts card-news">
                                <div class="wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="post-info">
                                        <span>{{$item->created_at->toFormattedDateString()}}</span>
                                        <span>{{'Grupo 900'}}</span>
                                    </div>
                                    <div class="post-content" style="padding: 12px">
                                        <h1>{{'Grupo 900'}}</h1>
                                        <p style="padding: 5px; text-align: justify">
                                            {!! $item->descripcion !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                @endif
            </div>
            <div class="col-sm-3">
                <div class="sidebar-container">
                    <div class="wow slideInUp" data-wow-delay="0.3s">
                        <h4>Grupos</h4>
                        <ul class="blog-cats">
                            <li><a href="#">Grupo 100</a></li>
                            <li><a onclick="buscar('grupo200')">Grupo 200</a></li>
                            <li><a href="#">Grupo 300</a></li>
                            <li><a href="#">Grupo 400</a></li>
                            <li><a href="#">Grupo 500</a></li>
                            <li><a href="#">Grupo 600</a></li>
                            <li><a onclick="buscar('grupo700')">Grupo 700</a></li>
                            <li><a onclick="buscar('grupo800')">Grupo 800</a></li>
                            <li><a onclick="buscar('grupo900')">Grupo 900</a></li>

                        </ul>
                    </div>
                  
                </div>
            </div>          	
        </div>            
    </div>
@endsection
@push('scripts')
<script>
    
    function init(){
            /*document.getElementById('grupo100').style.display = 'none';
            document.getElementById('grupo300').style.display = 'none';
            document.getElementById('grupo400').style.display = 'none';
            document.getElementById('grupo500').style.display = 'none';
            document.getElementById('grupo600').style.display = 'none';*/
            document.getElementById('grupo200').style.display = 'none';
            document.getElementById('grupo700').style.display = 'none';
            document.getElementById('grupo800').style.display = 'none';
            document.getElementById('grupo900').style.display = 'none';
            //document.getElementById('paradas').style.display = 'none';
            
    }
    function buscar(anchor){
            init();
            document.getElementById('lastnew').style.display = 'none';
            document.getElementById(anchor).style.display = 'block';
            window.location.href = "#"+anchor;
    }
    init();
</script>
@endpush
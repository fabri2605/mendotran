@extends('layouts.web')
@section('titulo')
<title> {{$hospital->denominacion}} </title>
@endsection
@section('contenido')
<div style="max-height: 300px !important; padding-top: 55px !important">
    
</div>
<style>
    .ink{
        font-size: 10px !important;
        font-weight: bold !important;
        color: #000 !important;
        text-decoration: none !important;
        text-transform: none !important;
    }
    div .entry-footer {
        padding-left:33px !important;
    }
    .icon{
        color: #999 !important;
        padding-right: 4px !important;
    }
   
</style>   
<div class="container-fluid block-content" style="background: #EDEDED !important">
        <hr>
            <div>
                    <div class="row">
                            <div style="text-align: center">
                                <h3 style="color: #45A041; padding: 10px">{{$hospital->denominacion}}</h3>
                            </div>
                            <input type="hidden" id="lat" value="{{$hospital->lat}}" >
                            <input type="hidden" id="lng" value="{{$hospital->lng}}" >
                            <input type="hidden" id="esc" value="{{$hospital->id}}" >
                            <input type="hidden" id="esc-deno" value="{{$hospital->denominacion}}" >
                            
                            <div class="nav-tabs-custom" style="padding: 5px">
                                    <ul class="nav nav-tabs">
                                      <li class="tab-escuela">
                                          <a href="#lineas" data-toggle="tab">
                                                <i class="fa fa-bus" aria-hidden="true"></i>
                                                &nbsp;Lineas
                                        </a>
                                      </li>
                                      <li class="tab-escuela active">
                                            <a href="#mapa" data-toggle="tab">
                                                    <i class="fa fa-map" aria-hidden="true"></i>
                                                    &nbsp;Mapa
                                              </a>    
                                      </li>
                                      <li class="tab-escuela"><a target="_blank" href="https://www.google.com.ar/maps/dir//{{$hospital->lat}},{{$hospital->lng}}/data=!3m1!4b1!4m2!4m1!3e3">
                                        <i class="fa fa-compass"></i>&nbsp;&nbsp;Cómo Llegar</a>
                                      </li>
                                    </ul>
                                    <hr>
                                    <div class="tab-content" style="width: 90%; margin: 0 auto">
                                        <div class="tab-pane" id="lineas" >
                                                <br/>
                                               <p style="font-size:16px">Recorridos cercanos en un radio de 500 mts. a la hospital seleccionada</p>
                                               <ul class="list-group" id="dgLineas"></ul>
                                               
                                        </div>     
                                        <div class="tab-pane active" style="padding: 20px !important" id="mapa">
                                            <div id="map_escuela"></div>
                                        </div>     
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
            
@endsection
@section('scripts')
    <script src="/js/waitingfor.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/site/escuela-detalle.js"></script>
@endsection
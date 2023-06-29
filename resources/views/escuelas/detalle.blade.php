@extends('layouts.web')
@section('titulo')
<title> {{$escuela->denominacion}} </title>
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
                            @if(!(strrpos($escuela->denominacion, "Universidad")))
                                <h3 style="color: #45A041; padding: 10px"><strong style="color: #c20000">ESCUELA Nº {{$escuela->codigo}} - </strong>  {{$escuela->denominacion}}</h3>
                            @endif
                            @if((strrpos($escuela->denominacion, "Universidad")))
                                <h3 style="color: #45A041; padding: 10px"><strong style="color: #c20000">UN </strong>  {{$escuela->denominacion}}</h3>
                            @endif
                            
                            <input type="hidden" id="lat" value="{{$escuela->lat}}" >
                            <input type="hidden" id="lng" value="{{$escuela->lng}}" >
                            <input type="hidden" id="esc" value="{{$escuela->id}}" >
                            <input type="hidden" id="esc-deno" value="{{$escuela->codigo}} - {{$escuela->denominacion}}" >
                            
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
                                      <li class="tab-escuela"><a href="#info" data-toggle="tab" >Información</a></li>
                                      <li class="tab-escuela"><a target="_blank" href="https://www.google.com.ar/maps/dir//{{$escuela->lat}},{{$escuela->lng}}/data=!3m1!4b1!4m2!4m1!3e3">
                                        <i class="fa fa-compass"></i>&nbsp;&nbsp;Cómo Llegar</a>
                                      </li>
                                    </ul>
                                    <hr>
                                    <div class="tab-content" style="width: 90%; margin: 0 auto">
                                        <div class="tab-pane" id="lineas" >
                                                <br/>
                                               <p style="font-size:16px">Recorridos cercanos en un radio de 500 mts. a la escuela seleccionada</p>
                                               <ul class="list-group" id="dgLineas"></ul>
                                               
                                        </div>     
                                        <div class="tab-pane active" style="padding: 20px !important" id="mapa">
                                            <div id="map_escuela"></div>
                                        </div>     
                                         <div class="tab-pane" id="info">
                                                <ul class="list-group">
                                                     @if($escuela)
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align:left"><strong>Nº {{$escuela->codigo}}</strong></td>
                                                                    <td style="text-align:left"><strong>{{$escuela->denominacion}}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left">DIRECCION</td>
                                                                    <td style="text-align:left"><strong>{{$escuela->descripcion}}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left">BARRIO</td>
                                                                    <td style="text-align:left"><strong>{{$escuela->barrio}}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left">LOCALIDAD</td>
                                                                    <td style="text-align:left"><strong>{{$escuela->locacion}}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left">DEPARTAMENTO</td>
                                                                    <td style="text-align:left"><strong>{{$escuela->depto}}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left">NIVEL</td>
                                                                    <td style="text-align:left"><strong>{{$escuela->nivel}}</strong></td></tr>
                                                                <tr>
                                                                    <td style="text-align:left">GESTIÓN</td>
                                                                    <td style="text-align:left"><strong>{{$escuela->subtipo}}</strong></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                     @endif
                                                 </ul>
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
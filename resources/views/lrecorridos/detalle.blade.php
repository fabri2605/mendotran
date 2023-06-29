@extends('layouts.web')
@section('titulo')
<title> {{$linea["bandera"]}} </title>
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
<?php 
    //$nroEtapas = intval(count($etapas)) -1
    
?>

<div class="container-fluid block-content" style="background: #EDEDED !important">
        <hr>
                <div>
                    <input type="hidden" id="traza" value="{{$linea["traza"]}}">
                    <div class="row" style="padding: 10px !important">
                            <h3 style="color: #45A041"><strong style="color: #c20000">{{$linea["linea"]}} - </strong>  {{$linea["bandera"]}}</h3>
                            <p>{{$linea["descripcion"]}}</p>
                            <input type="hidden" id="code" value="{{$linea["linea"]}}" >
                            <input type="hidden" id="name" value="{{$linea["bandera"]}}" >
                            <input type="hidden" id="desc" value="{{$linea["descripcion"]}}" >

                            <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="tab-linea recorrido-btn active">
                                            <a href="#mapa" data-toggle="tab">
                                                <i class="fa fa-map" aria-hidden="true"></i>
                                                &nbsp;Mapa
                                            </a>    
                                        </li>
                                      <li class="tab-linea recorrido-btn">
                                          <a href="#horarios" data-toggle="tab">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                &nbsp;Horarios
                                        </a>
                                      </li>
                                      
                                    </ul>
                                    <hr>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="mapa">
                                            <div id="map_linea"></div>
                                        </div>     
                                        <div class="tab-pane" id="horarios" style="padding: 5px !important">
                                                @if($habil )
                                                    <div class="card" style="background-color: #fff ">
                                                            <div class="card-header" id="tras-habil" style="background-color: #fff ">
                                                                    <h5 class="mb-0">
                                                                        <a style="color: #000; text-transform: uppercase" class="btn btn-link" data-toggle="collapse" data-target="#collapse-habil" aria-expanded="true" aria-controls="collapse-habil">
                                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                            &nbsp;Días Hábiles
                                                                        <a>
                                                                    </h5>
                                                            </div>
                                                            <hr>
                                                            <div style="background-color: #fff " id="collapse-habil" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="overflow-x: auto">
                                                                        
                                                                        <table class="hidden-xs table table-striped" border=1; >
                                                                            <thead class="grid-horarios" style="border-color: 2px #eee !important">
                                                                                <tr>
                                                                                    {{-- @dd($habil) --}}
                                                                                    @foreach($habil['etapas'] as $item)
                                                                                        <th>{!! $item !!}</th>
                                                                                    @endforeach
                                                                                </tr>    
                                                                            </thead>
                                                                            <tbody class="grid-body">
                                                                                @foreach($habil['horarios'] as $items)
                                                                                    <tr>
                                                                                    @foreach($items as $valor)
                                                                                        <td>{!! $valor !!}</td>
                                                                                    @endforeach
                                                                                    </tr>    
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="visible-xs-block">
                                                                            @php 
                                                                                $contador = 1; 
                                                                                $frecuencia = 1; 
                                                                                $total = count($habil['horarios']);
                                                                            @endphp
                                                                            @foreach($habil['horarios'] as $items)
                                                                                    @if($contador == 1)
                                                                                        <div class="card-header xs-frecuencia-title" id="tras-habil" >
                                                                                            <h5 class="mb-0">
                                                                                                <a style="color:#fff; font-size: 1.2rem;" class="btn btn-link collapsed" aria-controls="collapse-frecuencia-habil-{{$frecuencia}}" data-toggle="collapse" data-target="#collapse-frecuencia-habil-{{$frecuencia}}" aria-expanded="false">
                                                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                                                    Frecuencia &nbsp;{!! $frecuencia !!}  
                                                                                                <a>
                                                                                            </h5>
                                                                                        </div>
                                                                                        <div class="collapse"  id="collapse-frecuencia-habil-{{$frecuencia}}" aria-expanded="false" style="height: 0px" >
                                                                                        <table class="table table-striped" border=1;>
                                                                                        <tbody class="grid-body">
                                                                                    @endif
                                                                                    @foreach($items as $valor)    
                                                                                        <tr>
                                                                                            <td>{!! $valor !!}</td>
                                                                                        </tr>  
                                                                                    @endforeach
                                                                                    @php $frecuencia++ @endphp
                                                                                    </tbody>
                                                                                    </table>
                                                                                    </div>
                                                                            @endforeach
                                                                            </tbody>
                                                                            </table>
                                                                    </div>
                                                                        
                                                            </div>
                                                        </div>    
                                                @endif
                                                @if($sabado)
                                                    <div class="card" style="background-color: #fff ">
                                                            <div class="card-header" id="tras-habil" style="background-color: #fff ">
                                                                    <h5 class="mb-0">
                                                                        <a style="color: #000; text-transform: uppercase" class="btn btn-link" data-toggle="collapse" data-target="#collapse-sabado" aria-expanded="true" aria-controls="collapse-habil">
                                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                            &nbsp;Días Sábados
                                                                        <a>
                                                                    </h5>
                                                            </div>
                                                            <hr>
                                                            <div style="background-color: #fff " id="collapse-sabado" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="overflow-x: auto">
                                                                        
                                                                        <table class="hidden-xs table table-striped" border=1; >
                                                                            <thead class="grid-horarios" style="border-color: 2px #eee !important">
                                                                                <tr>
                                                                                    @foreach($sabado['etapas'] as $item)
                                                                                        <th>{!! $item !!}</th>
                                                                                    @endforeach
                                                                                </tr>    
                                                                            </thead>
                                                                            <tbody class="grid-body">
                                                                                @foreach($sabado['horarios'] as $items)
                                                                                    <tr>
                                                                                    @foreach($items as $valor)
                                                                                        <td>{!! $valor !!}</td>
                                                                                    @endforeach
                                                                                    </tr>    
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="visible-xs-block">
                                                                            @php 
                                                                                $contador = 1; 
                                                                                $frecuencia = 1; 
                                                                                $total = count($sabado['horarios']);
                                                                            @endphp
                                                                            @foreach($sabado['horarios'] as $items)
                                                                                    @if($contador == 1)
                                                                                        <div class="card-header xs-frecuencia-title" id="tras-sabado" >
                                                                                            <h5 class="mb-0">
                                                                                                <a style="color:#fff; font-size: 1.2rem;" class="btn btn-link collapsed" aria-controls="collapse-frecuencia-sabado-{{$frecuencia}}" data-toggle="collapse" data-target="#collapse-frecuencia-sabado-{{$frecuencia}}" aria-expanded="false">
                                                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                                                    Frecuencia &nbsp;{!! $frecuencia !!}  
                                                                                                <a>
                                                                                            </h5>
                                                                                        </div>
                                                                                        <div class="collapse"  id="collapse-frecuencia-sabado-{{$frecuencia}}" aria-expanded="false" style="height: 0px" >
                                                                                        <table class="table table-striped" border=1;>
                                                                                        <tbody class="grid-body">
                                                                                    @endif
                                                                                    @foreach($items as $valor)    
                                                                                        <tr>
                                                                                            <td>{!! $valor !!}</td>
                                                                                        </tr>  
                                                                                    @endforeach
                                                                                    @php $frecuencia++ @endphp
                                                                                    </tbody>
                                                                                    </table>
                                                                                    </div>
                                                                            @endforeach
                                                                            </tbody>
                                                                            </table>
                                                                    </div>
                                                                        
                                                            </div>
                                                        </div>    
                                                @endif
                                                @if($domingo)
                                                    <div class="card" style="background-color: #fff ">
                                                            <div class="card-header" id="tras-domingo" style="background-color: #fff ">
                                                                    <h5 class="mb-0">
                                                                        <a style="color: #000; text-transform: uppercase" class="btn btn-link" data-toggle="collapse" data-target="#collapse-domingo" aria-expanded="true" aria-controls="collapse-domingo">
                                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                            &nbsp;Días Domingo
                                                                        <a>
                                                                    </h5>
                                                            </div>
                                                            <hr>
                                                            <div style="background-color: #fff " id="collapse-domingo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="overflow-x: auto">
                                                                        
                                                                        <table class="hidden-xs table table-striped" border=1; >
                                                                            <thead class="grid-horarios" style="border-color: 2px #eee !important">
                                                                                <tr>
                                                                                    @foreach($domingo['etapas'] as $item)
                                                                                        <th>{!! $item !!}</th>
                                                                                    @endforeach
                                                                                </tr>    
                                                                            </thead>
                                                                            <tbody class="grid-body">
                                                                                @foreach($domingo['horarios'] as $items)
                                                                                    <tr>
                                                                                    @foreach($items as $valor)
                                                                                        <td>{!! $valor !!}</td>
                                                                                    @endforeach
                                                                                    </tr>    
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="visible-xs-block">
                                                                            @php 
                                                                                $contador = 1; 
                                                                                $frecuencia = 1; 
                                                                                $total = count($domingo['horarios']);
                                                                            @endphp
                                                                            @foreach($domingo['horarios'] as $items)
                                                                                    @if($contador == 1)
                                                                                        <div class="card-header xs-frecuencia-title" id="tras-domingo" >
                                                                                            <h5 class="mb-0">
                                                                                                <a style="color:#fff; font-size: 1.2rem;" class="btn btn-link collapsed" aria-controls="collapse-frecuencia-domingo-{{$frecuencia}}" data-toggle="collapse" data-target="#collapse-frecuencia-domingo-{{$frecuencia}}" aria-expanded="false">
                                                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                                                    Frecuencia &nbsp;{!! $frecuencia !!}  
                                                                                                <a>
                                                                                            </h5>
                                                                                        </div>
                                                                                        <div class="collapse"  id="collapse-frecuencia-domingo-{{$frecuencia}}" aria-expanded="false" style="height: 0px" >
                                                                                        <table class="table table-striped" border=1;>
                                                                                        <tbody class="grid-body">
                                                                                    @endif
                                                                                    @foreach($items as $valor)    
                                                                                        <tr>
                                                                                            <td>{!! $valor !!}</td>
                                                                                        </tr>  
                                                                                    @endforeach
                                                                                    @php $frecuencia++ @endphp
                                                                                    </tbody>
                                                                                    </table>
                                                                                    </div>
                                                                            @endforeach
                                                                            </tbody>
                                                                            </table>
                                                                    </div>
                                                                        
                                                            </div>
                                                        </div>    
                                                @endif
                                        </div>     
                    
                                    </div>
                            </div>
                    </div>
                </div>
   
@endsection
@section('scripts')
    <script src="/js/waitingfor.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/site/linea.js"></script>
    <script>
        
    </script>
@endsection
@extends('layouts.web')
@section('titulo')
<title> Nuevos Recorridos </title>
@endsection
@section('contenido')

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
        <div class="nav-tabs-custom hgroup wow zoomInUp" data-wow-delay="0.5s">
                <ul class="nav nav-tabs">
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g100' ? 'active' : 'active')}}"><a href="#g100" data-toggle="tab"><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 100</a></li>
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g200' ? 'active' : '')}}"><a href="#g200" data-toggle="tab" ><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 200</a></li>
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g300' ? 'active' : '')}}"><a href="#g300" data-toggle="tab" ><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 300</a></li>
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g400' ? 'active' : '')}}"><a href="#g400" data-toggle="tab" ><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 400</a></li>
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g500' ? 'active' : '')}}"><a href="#g500" data-toggle="tab" ><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 500</a></li>
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g600' ? 'active' : '')}}"><a href="#g600" data-toggle="tab" ><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 600</a></li>
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g700' ? 'active' : '')}}"><a href="#g700" data-toggle="tab" ><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 700</a></li>
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g800' ? 'active' : '')}}"><a href="#g800" data-toggle="tab" ><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 800</a></li>
                    <li class="tab-grupo recorrido-btn  {{ (request()->query('tab') == 'g900' ? 'active' : '')}}"><a href="#g900" data-toggle="tab" ><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Grupo 900</a></li>
                </ul>
                <hr>
                <div class="tab-content">
                        <div class="tab-pane {{ (request()->query('tab') == 'g100' ? 'active' : 'active')}}" id="g100">
                                <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-100.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 100</a>
                                @if($lineas)
                                <br/><br/>
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 1)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-100">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>    
                        <div class="tab-pane {{ (request()->query('tab') == 'g200' ? 'active' : '')}}" id="g200">
                                <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-200.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 200</a>
                                <br/><br/>
                                @if($lineas)
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 2)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}" >
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-200">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>    
                        
                        <div class="tab-pane {{ (request()->query('tab') == 'g300' ? 'active' : '')}}" id="g300">
                                <a class="btn recorrido-btn-red " target="_blank" href="/files/recorridos/mendotran-recorridos-300.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 300</a>
                                <br/><br/>
                                @if($lineas)
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 3)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-300">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>    
                        <div class="tab-pane {{ (request()->query('tab') == 'g400' ? 'active' : '')}}" id="g400">
                                <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-400.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 400</a>
                                <br/><br/>
                                @if($lineas)
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 4)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-400">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>    
                        <div class="tab-pane {{ (request()->query('tab') == 'g500' ? 'active' : '')}}" id="g500">
                                <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-500.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 500</a>
                                <br/><br/>
                                @if($lineas)
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 5)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-500">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>
                        <div class="tab-pane {{ (request()->query('tab') == 'g600' ? 'active' : '')}}" id="g600">
                                <a class="btn recorrido-btn-red " target="_blank" href="/files/recorridos/mendotran-recorridos-600.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 600</a>
                                <br/><br/>
                                @if($lineas)
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 6)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-600">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>     
                        <div class="tab-pane {{ (request()->query('tab') == 'g700' ? 'active' : '')}}" id="g700">
                                <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-700.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 700</a>
                                <br/><br/>
                                @if($lineas)
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 7)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-700">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>       
                        <div class="tab-pane {{ (request()->query('tab') == 'g800' ? 'active' : '')}}" id="g800">
                                <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-800.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 800</a>
                                <br/><br/>
                                @if($lineas)
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 8)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-800">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>    
                        <div class="tab-pane {{ (request()->query('tab') == 'g900' ? 'active' : '')}}" id="g900">
                                <a class="btn recorrido-btn-red " target="_blank" href="/files/recorridos/mendotran-recorridos-900.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 900</a>
                                <br/><br/>
                                @if($lineas)
                                <ul class="list-group">
                                    @foreach($lineas as $line)
                                        @if($line->grupo_id == 9)
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line->id) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-900">{{$line->codigo}}</strong> - 
                                                        {{$line->denominacion }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{strtoupper($line->descripcion) }}
                                                </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="list-group-item list-group-item-action">
                                            
                                    </li>
                                </ul>
                                
                            @endif
                        </div>    
                </div>
    </div>
@endsection
@section('scripts')
    <script src="js/waitingfor.js"></script>
    <script src="js/common.js"></script>
@endsection
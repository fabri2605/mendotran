@extends('layouts.web')
@section('titulo')
<title> Centros Escolares </title>
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
                            <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="tab-escuela {{ (request()->query('tab') == 'search' ? 'active' : 'active')}}"><a href="#search" data-toggle="tab"  >Buscar</a></li>
                                      <li class="tab-escuela {{ (request()->query('tab') == 'capital' ? 'active' : '')}}"><a href="#capital" data-toggle="tab"  >Capital</a></li>
                                      <li class="tab-escuela {{ (request()->query('tab') == 'godoycruz' ? 'active' : '')}}"><a href="#gc" data-toggle="tab" >Godoy Cruz</a></li>
                                      <li class="tab-escuela {{ (request()->query('tab') == 'guaymallen' ? 'active' : '')}}"><a href="#guaymallen" data-toggle="tab" >Guaymallén</a></li>
                                      <li class="tab-escuela {{ (request()->query('tab') == 'lasheras' ? 'active' : '')}}"><a href="#lasheras" data-toggle="tab"  >Las Heras</a></li>
                                      <li class="tab-escuela {{ (request()->query('tab') == 'lujan' ? 'active' : '')}}"><a href="#lujan" data-toggle="tab" >Luján de Cuyo</a></li>
                                      <li class="tab-escuela {{ (request()->query('tab') == 'maipu' ? 'active' : '')}}"><a href="#maipu" data-toggle="tab" >Maipú</a></li>
                                    </ul>
                                    <hr>
                                    <div class="tab-content" style="width: 80%; margin: 0 auto">
                                    <div class="tab-pane {{ (request()->query('tab') == 'search' ? 'active' : 'active')}}" id="search" style="min-height: 300px">
                                            <br/>
                                            <form id="frSearch" method="GET" action="{{route('site.escuelas')}}"  role="search" class="form-inline">
                                                <div class="input-group" style="width: 80%; margin: 0 auto">
                                                    &nbsp;<span class="input-group-addon" style="background-color: #C8102D; border: 1px solid #C8102D" ><i class="glyphicon glyphicon-search" style="font-size: 1.1rem; color: white"></i></span>
                                                    <input  id="search" type="text" value="{{ request('search') }}" class="form-control" name="search" placeholder="Buscar Escuela">
                                                </div>
                                            </form>
                                            <br/>
                                            @if($resultados)
                                                <ul class="list-group">
                                                    @foreach($resultados as $escuela)
                                                        <li class="list-group-item list-group-item-action">
                                                            <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.escuela_detalle', $escuela->id)}}">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1">
                                                                    @if(!(strrpos($escuela->denominacion, "Universidad")))
                                                                        <strong>ESCUELA Nº {{$escuela->codigo}}</strong> - 
                                                                    @endif
                                                                    @if((strrpos($escuela->denominacion, "Universidad")))
                                                                        <strong>UNIVERSIDAD</strong><br/><br/>
                                                                    @endif
                                                                    {{$escuela->denominacion }}
                                                                </h5>
                                                                <small>Nivel {{$escuela->nivel}}  -  {{$escuela->subtipo}}</small>
                                                                
                                                            </div>
                                                            <p class="mb-1">
                                                                <strong> Dirección: </strong>
                                                                {{$escuela->descripcion}} {{$escuela->barrio}}, {{$escuela->locacion}}
                                                                <span><b>{{$escuela->depto}}</b></span>
                                                            </p>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    <li class="list-group-item list-group-item-action">
                                                            {!! $resultados->appends(['tab' => 'search', 'search' => (request('search')) ])->links() !!}
                                                    </li>
                                                </ul>
                                            @endif
                                    </div>    
                                    <div class="tab-pane {{ (request()->query('tab') == 'capital' ? 'active' : '')}}" id="capital">
                                            @if($capital)
                                                <ul class="list-group">
                                                    @foreach($capital as $escuela)
                                                        <li class="list-group-item list-group-item-action">
                                                            <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.escuela_detalle', $escuela->id)}}">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1">
                                                                    <strong>ESCUELA Nº {{$escuela->codigo}}</strong> - 
                                                                    {{$escuela->denominacion }}
                                                                </h5>
                                                                <small>Nivel {{$escuela->nivel}}  -  {{$escuela->subtipo}}</small>
                                                               
                                                            </div>
                                                            <p class="mb-1">
                                                                <strong> Dirección: </strong>
                                                                {{$escuela->descripcion}} {{$escuela->barrio}}, {{$escuela->locacion}} {{$escuela->depto}}
                                                            </p>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    <li class="list-group-item list-group-item-action">
                                                            {!! $capital->appends(['tab' => 'capital'])->links() !!}
                                                    </li>
                                                </ul>
                                                
                                            @endif
                                        </div>            
                                        <div class="tab-pane {{ (request()->query('tab') == 'godoycruz' ? 'active' : '')}}" id="gc">
                                                @if($godoycruz)
                                                    <ul class="list-group">
                                                        @foreach($godoycruz as $escuela)
                                                            <li class="list-group-item list-group-item-action">
                                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.escuela_detalle', $escuela->id)}}">
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                        <h5 class="mb-1">
                                                                            <strong>ESCUELA Nº {{$escuela->codigo}}</strong> - 
                                                                            {{$escuela->denominacion }}
                                                                        </h5>
                                                                        <small>Nivel {{$escuela->nivel}}  -  {{$escuela->subtipo}}</small>
                                                                       
                                                                    </div>
                                                                    <p class="mb-1">
                                                                        <strong> Dirección: </strong>
                                                                        {{$escuela->descripcion}} {{$escuela->barrio}}, {{$escuela->locacion}} {{$escuela->depto}}
                                                                    </p>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                        <li class="list-group-item list-group-item-action">
                                                                {!! $godoycruz->appends(['tab' => 'godoycruz'])->links() !!}
                                                        </li>
                                                    </ul>
                                                    
                                                @endif
                                            </div> 
                                            <div class="tab-pane {{ (request()->query('tab') == 'guaymallen' ? 'active' : '')}}" id="guaymallen">
                                                    @if($guaymallen)
                                                        <ul class="list-group">
                                                            @foreach($guaymallen as $escuela)
                                                                <li class="list-group-item list-group-item-action">
                                                                    <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.escuela_detalle', $escuela->id)}}">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <h5 class="mb-1">
                                                                                <strong>ESCUELA Nº {{$escuela->codigo}}</strong> - 
                                                                                {{$escuela->denominacion }}
                                                                            </h5>
                                                                            <small>Nivel {{$escuela->nivel}}  -  {{$escuela->subtipo}}</small>
                                                                           
                                                                        </div>
                                                                        <p class="mb-1">
                                                                            <strong> Dirección: </strong>
                                                                            {{$escuela->descripcion}} {{$escuela->barrio}}, {{$escuela->locacion}} {{$escuela->depto}}
                                                                        </p>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                            <li class="list-group-item list-group-item-action">
                                                                    {!! $guaymallen->appends(['tab' => 'guaymallen'])->links() !!}
                                                            </li>
                                                        </ul>
                                                        
                                                    @endif
                                                </div> 
                                                <div class="tab-pane {{ (request()->query('tab') == 'lasheras' ? 'active' : '')}}" id="lasheras">
                                                        @if($lasheras)
                                                            <ul class="list-group">
                                                                @foreach($lasheras as $escuela)
                                                                    <li class="list-group-item list-group-item-action">
                                                                        <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.escuela_detalle', $escuela->id)}}">
                                                                            <div class="d-flex w-100 justify-content-between">
                                                                                <h5 class="mb-1">
                                                                                    <strong>ESCUELA Nº {{$escuela->codigo}}</strong> - 
                                                                                    {{$escuela->denominacion }}
                                                                                </h5>
                                                                                <small>Nivel {{$escuela->nivel}}  -  {{$escuela->subtipo}}</small>
                                                                                
                                                                            </div>
                                                                            <p class="mb-1">
                                                                                <strong> Dirección: </strong>
                                                                                {{$escuela->descripcion}} {{$escuela->barrio}}, {{$escuela->locacion}} {{$escuela->depto}}
                                                                            </p>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                                <li class="list-group-item list-group-item-action">
                                                                        {!! $lasheras->appends(['tab' => 'lasheras'])->links() !!}
                                                                </li>
                                                            </ul>
                                                            
                                                        @endif
                                                    </div>  
                                                    <div class="tab-pane {{ (request()->query('tab') == 'lujan' ? 'active' : '')}}" id="lujan">
                                                            @if($lujan)
                                                                <ul class="list-group">
                                                                    @foreach($lujan as $escuela)
                                                                        <li class="list-group-item list-group-item-action">
                                                                            <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.escuela_detalle', $escuela->id)}}">
                                                                                <div class="d-flex w-100 justify-content-between">
                                                                                    <h5 class="mb-1">
                                                                                        <strong>ESCUELA Nº {{$escuela->codigo}}</strong> - 
                                                                                        {{$escuela->denominacion }}
                                                                                    </h5>
                                                                                    <small>Nivel {{$escuela->nivel}}  -  {{$escuela->subtipo}}</small>
                                                                                    
                                                                                </div>
                                                                                <p class="mb-1">
                                                                                    <strong> Dirección: </strong>
                                                                                    {{$escuela->descripcion}} {{$escuela->barrio}}, {{$escuela->locacion}} {{$escuela->depto}}
                                                                                </p>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                    <li class="list-group-item list-group-item-action">
                                                                            {!! $lujan->appends(['tab' => 'lujan'])->links() !!}
                                                                    </li>
                                                                </ul>
                                                                
                                                            @endif
                                                        </div>   
                                                        <div class="tab-pane {{ (request()->query('tab') == 'maipu' ? 'active' : '')}}" id="maipu">
                                                                @if($maipu)
                                                                    <ul class="list-group">
                                                                        @foreach($maipu as $escuela)
                                                                            <li class="list-group-item list-group-item-action">
                                                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.escuela_detalle', $escuela->id)}}">
                                                                                    <div class="d-flex w-100 justify-content-between">
                                                                                        <h5 class="mb-1">
                                                                                            <strong>ESCUELA Nº {{$escuela->codigo}}</strong> - 
                                                                                            {{$escuela->denominacion }}
                                                                                        </h5>
                                                                                        <small>Nivel {{$escuela->nivel}}  -  {{$escuela->subtipo}}</small>
                                                                                        
                                                                                    </div>
                                                                                    <p class="mb-1">
                                                                                        <strong> Dirección: </strong>
                                                                                        {{$escuela->descripcion}} {{$escuela->barrio}}, {{$escuela->locacion}} {{$escuela->depto}}
                                                                                    </p>
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                        <li class="list-group-item list-group-item-action">
                                                                            {!! $maipu->appends(['tab' => 'maipu'])->links() !!}
                                                                        </li>
                                                                    </ul>
                                                                    
                                                                @endif
                                                            </div>   
                                    
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
       
@endsection
@section('scripts')
    <script src="js/waitingfor.js"></script>
    <script src="js/common.js"></script>
@endsection
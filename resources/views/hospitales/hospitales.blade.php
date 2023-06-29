@extends('layouts.web')
@section('titulo')
<title> Centros Asistenciales </title>
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
                                      <li class="tab-item {{ (request()->query('tab') == 'search' ? 'active' : 'active')}}"><a href="#search" data-toggle="tab"  >Buscar</a></li>
                                      <li class="tab-item {{ (request()->query('tab') == 'hospitales' ? 'active' : '')}}"><a href="#hospitales" data-toggle="tab"  >Centros Asistenciales</a></li>
                                    </ul>
                                    <hr>
                                    <div class="tab-content" style="width: 80%; margin: 0 auto">
                                    <div class="tab-pane {{ (request()->query('tab') == 'search' ? 'active' : 'active')}}" id="search" style="min-height: 300px">
                                            <br/>
                                            <form id="frSearch" method="GET" action="{{route('site.hospitales')}}"  role="search" class="form-inline">
                                                <div class="input-group" style="width: 80%; margin: 0 auto">
                                                    &nbsp;<span class="input-group-addon" style="background-color: #C8102D; border: 1px solid #C8102D" ><i class="glyphicon glyphicon-search" style="font-size: 1.1rem; color: white"></i></span>
                                                    <input  id="search" type="text" value="{{ request('search') }}" class="form-control" name="search" placeholder="Buscar Municipio">
                                                </div>
                                            </form>
                                            <br/>
                                            @if($resultados)
                                            <ul class="list-group">
                                                @foreach($resultados as $item)
                                                    <li class="list-group-item list-group-item-action">
                                                        <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.hospital_detalle', $item->id)}}">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">
                                                                {{$item->denominacion }}
                                                            </h5>
                                                        </div>
                                                        <p class="mb-1">
                                                            <strong> Dirección: </strong>
                                                            {{$item->descripcion}} {{$item->barrio}}, {{$item->locacion}}
                                                            <span><b>{{$item->depto}}</b></span>
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
                                    <div class="tab-pane {{ (request()->query('tab') == 'hospitales' ? 'active' : '')}}" id="hospitales">
                                            @if($hospitales)
                                                <ul class="list-group">
                                                   
                                                    @foreach($hospitales as $item)
                                                        <li class="list-group-item list-group-item-action">
                                                            <a style="text-decoration: none !important; color: inherit;" href="{{route('sitio.hospital_detalle', $item->id)}}">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1">
                                                                    {{$item->denominacion }}
                                                                </h5>
                                                            </div>
                                                            <p class="mb-1">
                                                                <strong> Dirección: </strong>
                                                                {{$item->descripcion}} {{$item->barrio}}, {{$item->locacion}} {{$item->depto}}
                                                            </p>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    <li class="list-group-item list-group-item-action">
                                                            {!! $hospitales->appends(['tab' => 'capital'])->links() !!}
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
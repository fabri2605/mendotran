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
                                {{-- <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-100.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 100</a> --}}
                                @if($data)
                                <br/><br/>
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if((intval($line["linea"]) < 200 && intval($line["linea"]) > 0) || (intval($line["linea"]) < 1200 && intval($line["linea"]) > 1000))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-100">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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
                                {{-- <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-200.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 200</a> --}}
                                <br/><br/>
                                @if($data)
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if(intval($line["linea"]) > 199 && intval($line["linea"]) < 300 || (intval($line["linea"]) < 1300 && intval($line["linea"]) > 1199))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}" >
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-200">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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
                                {{-- <a class="btn recorrido-btn-red " target="_blank" href="/files/recorridos/mendotran-recorridos-300.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 300</a> --}}
                                <br/><br/>
                                @if($data)
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if(intval($line["linea"]) > 299 && intval($line["linea"]) < 400 || (intval($line["linea"]) < 1400 && intval($line["linea"]) > 1299))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-300">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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
                                {{-- <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-400.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 400</a> --}}
                                <br/><br/>
                                @if($data)
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if(intval($line["linea"]) > 399 && intval($line["linea"]) < 500 || (intval($line["linea"]) < 1500 && intval($line["linea"]) > 1399))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-400">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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
                                {{-- <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-500.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 500</a> --}}
                                <br/><br/>
                                @if($data)
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if(intval($line["linea"]) > 499 && intval($line["linea"]) < 600 || (intval($line["linea"]) < 1600 && intval($line["linea"]) > 1499))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-500">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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
                                {{-- <a class="btn recorrido-btn-red " target="_blank" href="/files/recorridos/mendotran-recorridos-600.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 600</a> --}}
                                <br/><br/>
                                @if($data)
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if(intval($line["linea"]) > 599  && intval($line["linea"]) < 700 || (intval($line["linea"]) < 1700 && intval($line["linea"]) > 1599))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-600">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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
                                {{-- <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-700.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 700</a> --}}
                                <br/><br/>
                                @if($data)
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if(intval($line["linea"]) > 699 && intval($line["linea"]) < 800 || (intval($line["linea"]) < 1800 && intval($line["linea"]) > 1699))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-700">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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
                                {{-- <a class="btn recorrido-btn-red" target="_blank" href="/files/recorridos/mendotran-recorridos-800.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 800</a> --}}
                                <br/><br/>
                                @if($data)
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if(intval($line["linea"]) > 799 && intval($line["linea"]) < 900 || (intval($line["linea"]) < 1900 && intval($line["linea"]) > 1799))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-800">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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
                                {{-- <a class="btn recorrido-btn-red " target="_blank" href="/files/recorridos/mendotran-recorridos-900.pdf"><i class="fa fa-download"></i>&nbsp;&nbsp;Descargar recorridos Grupo 900</a> --}}
                                <br/><br/>
                                @if($data)
                                <ul class="list-group">
                                    @foreach($data as $line)
                                        @if(intval($line["linea"]) > 899 && intval($line["linea"]) < 1000 || (intval($line["linea"]) < 2000 && intval($line["linea"]) > 1899))
                                            <li class="list-group-item list-group-item-action">
                                                <a style="text-decoration: none !important; color: inherit;" href="{{route('site.detalle.recorrido', $line["servicio_id"]) }}">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="font-weight: 600">
                                                        <strong class="color-900">{{intval($line["linea"])}}</strong> -
                                                        {{$line["bandera"] }}
                                                    </h5>
                                                </div>
                                                <p>
                                                    {{ strtoupper($line["descripcion_traza_autorizada"]) }}
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

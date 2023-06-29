@extends('layouts.web')
@section('titulo')
<title> Trasbordos Troncales </title>
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
<main class="entry-main">
        <div class="blog section-without-title" id="blog">
            <div class="container" style="background: #EDEDED !important">
                <div class="posts">
                    <div class="row">
                            <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="tab-escuela {{ (request()->query('tab') == 'trasbordos' ? 'active' : 'active')}}"><a href="#search" data-toggle="tab"  >Trasbordos Troncales</a></li>
                                    </ul>
                                    
                                    <div class="tab-content">
                                    <div class="tab-pane {{ (request()->query('tab') == 'trasbordos' ? 'active' : 'active')}}" id="search">
                                            <br/>
                                            @if($trasbordos)
                                            <div id="accordion">
                                                @foreach($trasbordos as $item)
                                                    <div class="card" style="background-color: #fff ">
                                                        <div class="card-header" id="tras-{{$item->id}}" style="background-color: #fff ">
                                                          <h5 class="mb-0">
                                                          <button style="color: #000; text-transform: uppercase" class="btn btn-link mb-1" data-toggle="collapse" data-target="#collapse-{{$item->id}}" aria-expanded="true" aria-controls="collapse-{{$item->id}}">
                                                                <strong>
                                                                
                                                                {{$item->linea->codigo}}</strong> - {{$item->linea->denominacion}}
                                                            </button>
                                                          </h5>
                                                        </div>
                                                        <div style="background-color: #fff " id="collapse-{{$item->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                          <div class="card-body">
                                                                <img class="img-responsive" src="{{Storage::url($item->imagen)}}"/>
                                                          </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                
                                            </div>
                                        @endif
                                    </div>    
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="js/waitingfor.js"></script>
    <script src="js/common.js"></script>
@endsection
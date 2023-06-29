@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Parametros de Configuración</h4>
                <h6 class="card-subtitle"></h6>
            </div>
            <hr class="m-t-0">
            <form class="form-horizontal striped-rows b-form" action="{{ route('parametros.editar', $parametro->id) }}" method="POST" enctype="multipart/form-data">
                {!! method_field('PUT') !!}
                @include('parametros.form')
                <hr>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Modificar</button>
                    </div>
                </div>
            </form>
         </div>
</div>
</div>
@endsection
                
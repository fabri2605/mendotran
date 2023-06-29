    
@extends('layouts.app')
@push('head-style')
    
@endpush
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Noticias </h4>
                    <h6 class="card-subtitle">A continuación se desplegaran todos las noticias del sistema </h6>
                    <hr>
                    <div class="col-lg-12 col-md-12 "">
                        <button type="button" class="btn bprimario cblanco btn-sm " onclick="window.location='{{ route('noticias.create') }}'">
                            <i class="ti-plus"></i>
                            Nuevo
                        </button>
                    </div>
                    <div class="table-responsive">
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                    @include('noticias.table')    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
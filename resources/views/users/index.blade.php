    
@extends('layouts.app')
@push('head-style')
    
@endpush
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Usuarios </h4>
                    <h6 class="card-subtitle">A continuación se desplegaran todos los usuarios del sistema </h6>
                    <hr>
                    <div class="col-lg-4 col-md-4 float-left">
                        <button type="button" class="btn bprimario cblanco " onclick="window.location='{{ route('users.create') }}'">
                            <i class="ti-plus"></i>
                            Nuevo
                        </button>
                    </div>
                    <div class="table-responsive">
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                    @include('users.table')    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
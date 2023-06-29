<table id="zero_config" class="table table-striped table-bordered  display dataTable" role="grid" >
    <thead>
        <tr>
            <th>Image</th>
            <th>Fecha</th>
            <th>Título</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($noticias as $item)
            <tr>
                <td><img src="{{$item->imagen}}" style="width: 50px" class="img-fluid"></td>
                <td>{{$item->created_at->format('d/m/Y')}}</td>
                <td>{{$item->titulo}}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" onclick="window.location='{{ route('noticias.edit', $item->id) }}'">
                            <i class="ti-pencil"></i>
                        </button>
                        &nbsp;&nbsp;
                        <button type="button" id="{{$item->id}}" class="btn btn-danger eliminarNoticia">
                            <i class="ti-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.eliminarNoticia', function () {
            let row = $(this);
            console.log(row[0].id);
            var product_id = row[0].id;
            $.confirm({
                title: 'Advertencia',
                content: 'Desea eliminar la noticia seleccionada?',
                icon: 'mdi mdi-alert-circle '+'red',
                buttons: {
                    aceptar: {
                        text: 'Eliminar',
                        btnClass: 'btn-success',
                        keys: ['enter', 'shift'],
                        action :function () {
                            $.ajax({
                                url: "noticias/eliminar/"+product_id,
                                method: 'DELETE',
                            }).done(function(data) {
                                if(data.status == 'success'){
                                    showMsg('Información!', data.msg,'green');
                                    location.reload();
                                }else{
                                    showMsg('Advertencia!', data.msg,'red');
                                }
                            });
                        }
                    },
                    cancelar: {
                        text: 'Cancelar',
                        btnClass: 'btn-danger',
                        keys: ['enter', 'shift'],
                        action: function () {
                        
                        }
                    },
                },
        });
    });
    </script>
@endpush
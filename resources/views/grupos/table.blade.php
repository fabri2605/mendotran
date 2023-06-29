<table id="zero_config" class="table table-striped table-bordered  display dataTable" role="grid" >
    <thead>
        <tr>
            <th>Código</th>
            <th>Denominación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($grupos as $item)
            <tr>
                <td>{{$item->codigo}}</td>
                <td>{{$item->denominacion}}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" onclick="window.location='{{ route('grupos.edit', $item->id) }}'">
                            <i class="ti-pencil"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
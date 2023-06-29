    <table id="zero_config" class="table table-striped table-bordered  display dataTable" role="grid" >
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info" onclick="window.location='{{ route('users.edit', $item->id) }}'">
                                <i class="ti-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form{{$item->id}}').submit();">
                                <i class="ti-trash"></i>
                            </button>
                            <form id="delete-form{{$item->id}}" action="{{route('users.destroy', $item->id)}}" method="POST" style="display: hidden;">
                                @csrf
                                {!! method_field('DELETE') !!}
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
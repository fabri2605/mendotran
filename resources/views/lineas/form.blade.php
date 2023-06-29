
<div class="card-body">
    <h4 class="card-title">Información de Línea</h4>
    @csrf  
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Código</label>
            </div>
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('codigo') ? ' is-invalid' : '' }}" id="codigo" name="codigo"  value="{{ old('codigo', $linea->codigo)  }}" required>
            @if ($errors->has('codigo'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('codigo') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Denominación</label>
            </div>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control {{ $errors->has('denominacion') ? ' is-invalid' : '' }}" id="denominacion" name="denominacion"  value="{{ old('denominacion', $linea->denominacion)  }}">
            @if ($errors->has('denominacion'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('denominacion') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Descripción</label>
            </div>
        </div>
        <div class="col-sm-9">
            <textarea type="text" class="form-control {{ $errors->has('introduccion') ? ' is-invalid' : '' }} summernote"  name="descripcion" >{{ old('descripcion', $linea->descripcion)  }}</textarea>
            @if ($errors->has('descripcion'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('descripcion') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Grupo</label>
            </div>
        </div>
        <div class="col-sm-1">
            <select style="width: 200px" name="grupo_id" id="cbGrupos" class="combo form-control custom-select js-example-responsive">
                @if($grupos)
                    @foreach($grupos as $item)
                        <option value="{{$item->id}}" @if($linea->grupo_id == $item->id) selected @endif>{{$item->denominacion}} {{$item->codigo}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
<hr>
@push('scripts')
    <script>
        $('.summernote').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        }); 
    </script>
@endpush

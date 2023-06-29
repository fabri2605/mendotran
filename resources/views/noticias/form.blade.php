
<div class="card-body">
    <h4 class="card-title">Información de Línea</h4>
    @csrf  
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Título</label>
            </div>
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}" id="titulo" name="titulo"  value="{{ old('titulo', $noticia->titulo)  }}" required>
            @if ($errors->has('titulo'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('titulo') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Bajada</label>
            </div>
        </div>
        <div class="col-sm-9">
            <textarea type="text" class="form-control {{ $errors->has('bajada') ? ' is-invalid' : '' }} summernote"  name="bajada" >{{ old('bajada', $noticia->bajada)  }}</textarea>
            @if ($errors->has('bajada'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('bajada') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Noticia</label>
            </div>
        </div>
        <div class="col-sm-9">
            <textarea type="text" class="form-control {{ $errors->has('noticia') ? ' is-invalid' : '' }} summernote"  name="noticia" >{{ old('noticia', $noticia->noticia)  }}</textarea>
            @if ($errors->has('noticia'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('noticia') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">URL</label>
            </div>
        </div>
        <div class="col-sm-7">
            <input type="text" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" id="url" name="url"  value="{{ old('url', $noticia->url)  }}" required>
            @if ($errors->has('url'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <div class="b-label">
                <label for="denominacion" class="control-label col-form-label">Imagen Noticia</label>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <input name="imagen" id="imagen" type="hidden" value="{{$noticia->imagen}}" >
                    <img id="show_imagen" src="{{$noticia->imagen}}" class="img-fluid">
                    <input type="file"  id="select_imagen" class="form-control" >
                </div>
                <div class="col-lg-4 col-xs-12">
                    <br>
                    <button type="button" class="btn btn-danger" id="btnCleanImagen">
                        <i class="ti-trash"></i>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">     
    
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
        $('#select_imagen').change(function(e){
            let val = $(this).val();
            if(val != $('#imagen').val()){
                let file = this.files[0];
                var formData = new FormData();
                formData.append('imagen', file);
                formData.append('_token',  $('#token').val());
                $.ajax({
                    url: '/noticias/upload/img',  
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#imagen').val(response);
                        $('#show_imagen').attr('src', response);
                    }
                });
            }
        });
        $('#btnCleanImagen').on('click',function(){
            $('#imagen').val('');
            $('#show_imagen').attr('src', '');
            $('#select_imagen').val('');
        });
    </script>
@endpush

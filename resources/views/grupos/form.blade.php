
<div class="card-body">
    <h4 class="card-title">Información de Grupo</h4>
    @csrf  
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Código</label>
            </div>
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('codigo') ? ' is-invalid' : '' }}" id="codigo" name="codigo"  value="{{ old('codigo', $grupo->codigo)  }}" required>
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
        <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('denominacion') ? ' is-invalid' : '' }}" id="denominacion" name="denominacion"  value="{{ old('denominacion', $grupo->denominacion)  }}">
            @if ($errors->has('denominacion'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('denominacion') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
</div>
<hr>

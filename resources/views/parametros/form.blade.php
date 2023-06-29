
<div class="card-body">
    @csrf  
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="boton_eventos" class="control-label col-form-label negrita">Restricción DNI Covid19</label>
        </div>
        <div class="col-sm-2">
            <select name="restriccion_covid" id="cbRestriccion" class="combo form-control custom-select js-example-responsive">
                <option value="1" @if($parametro->restriccion_covid == 1) selected @endif>Sí</option>
                <option value="0" @if($parametro->restriccion_covid == 0) selected @endif>No</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="boton_eventos" class="control-label col-form-label negrita">Introducción del Sitio</label>
        </div>
        <div class="col-sm-8">
            <textarea type="text" class="form-control {{ $errors->has('introduccion') ? ' is-invalid' : '' }} summernote"  name="introduccion" >{{ old('introduccion', $parametro->introduccion)  }}</textarea>
            @if ($errors->has('introduccion'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('introduccion') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="boton_eventos" class="control-label col-form-label negrita">Texto Adicional</label>
        </div>
        <div class="col-sm-8">
            <textarea type="text" class="form-control {{ $errors->has('texto_adicional') ? ' is-invalid' : '' }} summernote"  name="texto_adicional" >{{ old('texto_adicional', $parametro->texto_adicional)  }}</textarea>
            @if ($errors->has('texto_adicional'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('texto_adicional') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="direccion" class="control-label col-form-label negrita">Dirección</label>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}"  name="direccion"  value="{{ old('direccion', $parametro->direccion)  }}"> 
            @if ($errors->has('direccion'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('direccion') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="horario" class="control-label col-form-label negrita">Horario</label>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control {{ $errors->has('horario') ? ' is-invalid' : '' }}"  name="horario"  value="{{ old('horario', $parametro->horario)  }}"> 
            @if ($errors->has('horario'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('horario') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="telefono" class="control-label col-form-label negrita">Teléfono</label>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}"  name="telefono"  value="{{ old('telefono', $parametro->telefono)  }}"> 
            @if ($errors->has('telefono'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('telefono') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="link_boleto_municipal" class="control-label col-form-label negrita">Link Boleto Municipal</label>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control {{ $errors->has('link_boleto_municipal') ? ' is-invalid' : '' }}"  name="link_boleto_municipal"  value="{{ old('link_boleto_municipal', $parametro->link_boleto_municipal)  }}"> 
            @if ($errors->has('link_boleto_municipal'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('link_boleto_municipal') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <label for="link_boleto_nacional" class="control-label col-form-label negrita">Link Boleto Nacional</label>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control {{ $errors->has('link_boleto_nacional') ? ' is-invalid' : '' }}"  name="link_boleto_nacional"  value="{{ old('link_boleto_nacional', $parametro->link_boleto_nacional)  }}"> 
            @if ($errors->has('link_boleto_nacional'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('link_boleto_nacional') }}</strong>
                </span>
            @endif
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
    
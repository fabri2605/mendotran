
<div class="card-body">
    <h4 class="card-title">Información de Usuario</h4>
    @csrf  
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="name" class="control-label col-form-label">Nombre Completo</label>
            </div>
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Ingrese su nombre completo" value="{{ old('name', $user->name)  }}">
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="email" class="control-label col-form-label">Usuario</label>
            </div>
        </div>
        <div class="col-sm-5">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="Ingrese su correo electrónico" value="{{ old('email', $user->email)  }}">
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    @if(!$user->id)
        <div class="form-group row">
                <div class="col-sm-3">
                    <div class="b-label">
                        <label for="pass" class="control-label col-form-label">Contraseña</label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <input type="password" name="password" class="form-control" value="{{ old('password', $user->password)  }}"  >
                </div>
        </div>
        <div class="form-group row">
                <div class="col-sm-3">
                    <div class="b-label">
                        <label for="pass" class="control-label col-form-label"> Re Contraseña</label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <input type="password" name="reclave" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  >
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
        </div>
    @endif
    <div class="form-group row">
        <div class="col-sm-3">
            <div class="b-label">
                <label for="pass" class="control-label col-form-label"> Roles</label>
            </div>
        </div>
        <div class="col-sm-5">
            <select name="roles[]" multiple="multiple" id="cbRoles" class="combo form-control custom-select js-example-responsive">
                    <option value="-1"></option>
                    @if($roles)
                        @foreach($roles as $item)
                            <option value="{{$item->id}}"
                                @if($user->roles->pluck('id')->contains($item->id))
                                    selected
                                @endif
                            >
                                {{$item->display_name}}
                            </option>
                        @endforeach
                    @endif
            </select>
        </div>
    </div>
</div>
<hr>
@push('scripts')
<script>
    $( document ).ready(function() {
        $("#cbEventos").select2({ containerCssClass: 'wrap' });
        function configurarRoles(flag){
            if(flag){
                $('#cbRoles').val(null).trigger('change');
                $('#cbRoles').val(['1']).trigger('change');
            }else{
                let valores = $('#cbRoles').val();
                valores = jQuery.grep(valores, function( a ) {
                         return a !== "1";
                      });
                $('#cbRoles').val(valores).trigger('change');
            }
        }
        $('#cbRoles').change();
    });
</script>
@endpush

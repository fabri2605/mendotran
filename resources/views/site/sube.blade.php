@extends('layouts.app')
@section('titulo')
<title> Sube </title>
@endsection
@section('contenido')
<style>
    #mapa {
        min-height: 300px;
        height: 100%;
    }
</style>
<br>
<div class="container-fluid block-content" style="background: #EDEDED !important">
    <div class="row main-grid">
        <div class="col-sm-2">
            
        </div>
        <div class="col-sm-8 wow fadeInRight" data-wow-delay="0.3s">
            <div class="wow fadeInRight" data-wow-delay="0.2s" style="text-align: center">
                <img src="/images/sube2.png">
            </div>
            <hr>
            <h4>Formulario de Solicitud</h4>
            <p>Complete el siguiente formulario con sus datos personales y determine porque oficina desea retirar su tarjeta SUBE</p>
            <div id="success"></div>
            <form novalidate id="contactForm" class="reply-form form-inline">
                <div class="row form-elem">	
                    <div class="col-sm-6 form-elem">
                        <div class="default-inp form-elem">
                            <i class="fa fa-user"></i>
                            <input type="text" name="user-name" id="user-name" placeholder="Nombre" required="required">
                        </div>
                        <div class="default-inp form-elem">
                            <i class="fa fa-envelope"></i>
                            <input type="text" name="user-email" id="user-email" placeholder="Correo Electrónico" required="required">
                        </div>
                    </div>
                    <div class="col-sm-6 form-elem">
                        <div class="default-inp form-elem">
                            <i class="fa fa-user"></i>
                            <input type="text" name="user-lastname" id="user-lastname" placeholder="Apellido" required="required">
                        </div>
                        <div class="default-inp form-elem">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="user-phone" id="user-phone" placeholder="Celular">
                        </div>
                    </div>
                </div>
                <div class="row form-elem">	
                    <div class="col-sm-6 form-elem">
                        <div class="default-inp form-elem">
                            <i class="fa fa-credit-card"></i>
                            <input type="number" name="user-dni" id="user-dni" placeholder="Documento" required="required">
                        </div>
                    </div>
                    <div class="col-sm-5 form-elem">
                        <div class="default-inp form-elem">
                            <select id="cbOficina" name="oficina">
                                <option value="-1">Seleccione la oficina mas cercana</option>
                                <option value="1">San Martín 1320</option>
                                <option value="2">Las Heras 1320</option>
                                <option value="3">Corrientes 1320</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-danger btn-default" data-toggle="modal" data-target="#mmapa">Ver</button>
                    </div>
                </div>
                <div class="row form-elem">	
                        <div class="col-sm-6 form-elem">
                                <div class="default-inp form-elem">
                                    <select id="cbOficina" name="oficina">
                                        <option value="-1">Fechas Disponibles</option>
                                        <option value="1">01/08/2019 - 09:00</option>
                                        <option value="1">01/08/2019 - 10:00</option>
                                        <option value="1">01/08/2019 - 12:00</option>
                                        <option value="1">02/08/2019 - 11:00</option>
                                        <option value="1">02/08/2019 - 09:30</option>
                                    </select>
                                </div>
                            </div>
                    <div class="col-sm-6 form-elem">
                    </div>
                    
                    
                </div>
                
                <div class="form-elem">
                    <button type="submit" class="btn btn-success btn-default">Solicitar Turno</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mmapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubicación Oficina </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div id="mapa"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@push('scripts')
      <script>
        var map;
        function initMap() {
          map = new google.maps.Map(document.getElementById('mapa'), {
            center: {lat: -32.88994669905239, lng: -68.8432895832634},
            zoom: 16
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKeqk737i7t4NxKHd2ht6TZ7AsSErFcqQ&callback=initMap"
      async defer>
      </script>
@endpush
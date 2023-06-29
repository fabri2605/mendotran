@extends('layouts.web')
@section('titulo')
<title> Carga Virtual </title>
@endsection
@section('contenido')
    <div class="container-fluid block-content" style="background: #EDEDED !important">
                <div class="row">
                    <div class="col-md-6" style="width: 80%; margin: 0 auto">
                        <p style="font-size: 19px; text-align: justify">Para conocer los medios de carga virtuales selecciona tu red bancaria y tu banco</p>
                        <div class="col-md-6 box-carga" style="color: #f4f4f4; padding: 10px" >
                            <p>
                                Si no tenés el usuario y clave, debés gestionarlo a través de homebanking del banco al que pertenece tu cuenta bancaria
                            </p>
                            <p>
                                Recordá que la carga virtual se acredita entre <b>24</b> y <b>48</b> hs. de realizada la carga
                            </p>
                            <p>
                                Para que impacte la carga en el sistema debés pasar la tarjeta por una máquina validadora en el colectivo
                            </p>
                        </div>
                    </div>
                </div>
                <br/><br/>
                <div class="row">
                        <div class="col-md-6">
                                <select  class="form-control" id="redes" onchange="changeRed()">
                                    <option value="-1" selected>Seleccione una red bancaria</option>
                                    <option value="banelco">Banelco</option>
                                    <option value="link">Link</option>
                                </select>
                        </div>
                </div>
                <div class="row" id="link" style="display:none">
                        <br/>
                        <div class="col-md-12">
                                <div class="row">
                                        <div class="col-xs-6 col-md-2 ">
                                          <a href="http://www.bna.com.ar/Personas/HomeBanking" class="thumbnail cbox" target="_blank">
                                            <img src="/images/carga/lbanco-nacion.png" alt="...">
                                          </a>
                                        </div>
                                        <div class="col-xs-6 col-md-2 ">
                                                <a href="https://bancainternet.bancocredicoop.coop/bcclbe/init.jsp" class="thumbnail cbox" target="_blank">
                                                  <img src="/images/carga/lbanco-credicop.png" alt="...">
                                                </a>
                                        </div>
                                        <div class="col-xs-6 col-md-2 ">
                                            <a href="http://www.bancodecomercio.com.ar/" class="thumbnail cbox" target="_blank">
                                                <img src="/images/carga/lbanco-comercio.png" alt="...">
                                            </a>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-6 col-md-2 ">
                                            <a href="https://hb.hipotecario.com.ar/homebanking/login.do" class="thumbnail cbox" target="_blank">
                                                <img src="/images/carga/lbaco-hipotecario.png" alt="...">
                                            </a>
                                        </div>
                                        <div class="col-xs-6 col-md-2 ">
                                                <a href="https://www.bind.com.ar/banca-electronica" class="thumbnail cbox" target="_blank">
                                                    <img src="/images/carga/lbanco-industrial.png" alt="...">
                                                </a>
                                            </div>
                                        <!--<div class="col-xs-6 col-md-3">
                                                <a href="#" class="thumbnail cbox" target="_blank">
                                                    <img src="/images/carga/link-celular.png" alt="...">
                                                </a>
                                        </div> !-->
                                </div>
                        </div>
                </div>
                <div class="row" id="banelco" style="display:none">
                        <br/>
                    <div class="col-md-12">
                            <div class="row">
                                    <div class="col-xs-6 col-md-2">
                                      <a href="https://pagomiscuentas.com/" class="thumbnail cbox" target="_blank">
                                        <img src="/images/carga/pago-mis-cuentas.png" alt="...">
                                      </a>
                                    </div>
                                    <div class="col-xs-6 col-md-2">
                                            <a href="http://www.banelco.com/banelco-movil" class="thumbnail cbox" target="_blank">
                                              <img src="/images/carga/banelco-movil.png" alt="...">
                                            </a>
                                    </div>
                                    <div class="col-xs-6 col-md-2">
                                        <a href="https://hbsrv.bancocolumbia.com.ar/html/Inicio.html?" class="thumbnail cbox" target="_blank">
                                            <img src="/images/carga/banco-columbia.png" alt="...">
                                        </a>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="col-xs-6 col-md-2">
                                      <a href="https://hb.comafi.com.ar/homebank/HBI.do" class="thumbnail cbox" target="_blank">
                                        <img src="/images/carga/banco-comafi.png" alt="...">
                                      </a>
                                    </div>
                                    <div class="col-xs-6 col-md-2">
                                            <a href="https://www.bbvafrances.com.ar/" class="thumbnail cbox" target="_blank">
                                              <img src="/images/carga/banco-frances.png" alt="...">
                                            </a>
                                    </div>
                                    <div class="col-xs-6 col-md-2">
                                        <a href="https://onlinebanking.bancogalicia.com.ar/login" class="thumbnail cbox" target="_blank">
                                            <img src="/images/carga/banco-galicia.png" alt="...">
                                        </a>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="col-xs-6 col-md-2">
                                      <a href="https://www.hsbc.com.ar/es/personas/canales/online-banking.asp" class="thumbnail cbox" target="_blank">
                                        <img src="/images/carga/banco-hsbc.png" alt="...">
                                      </a>
                                    </div>
                                    <div class="col-xs-6 col-md-2">
                                            <a href="https://www.accessbanking.com.ar/RetailHomeBankingWeb/init.do/" class="thumbnail cbox" target="_blank">
                                              <img src="/images/carga/banco-icbc.png" alt="...">
                                            </a>
                                    </div>
                                    <div class="col-xs-6 col-md-2">
                                        <a href="https://internet.itau.com.ar/internet/sso" class="thumbnail cbox" target="_blank">
                                            <img src="/images/carga/banco-itau.png" alt="...">
                                        </a>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="col-xs-6 col-md-2">
                                      <a href="https://www.macro.com.ar/bancainternet/" class="thumbnail cbox" target="_blank">
                                        <img src="/images/carga/banco-macro.png" alt="...">
                                      </a>
                                    </div>
                                    <div class="col-xs-6 col-md-2">
                                            <a href="http://www.bancopatagonia.com/personas/can_ebank.shtml" class="thumbnail cbox" target="_blank">
                                              <img src="/images/carga/banco-patagonia.png" alt="...">
                                            </a>
                                    </div>
                                    <div class="col-xs-6 col-md-2">
                                        <a href="https://www2.personas.santanderrio.com.ar/obp-webapp/angular/#!/login" class="thumbnail cbox" target="_blank">
                                            <img src="/images/carga/banco-santander.png" alt="...">
                                        </a>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="col-xs-6 col-md-2">
                                      <a href="https://personas.supervielle.com.ar/Login.aspx" class="thumbnail cbox" target="_blank">
                                        <img src="/images/carga/banco-superville.png" alt="...">
                                      </a>
                                    </div>
                            </div>
                    </div>
                 </div>
                </div>
@endsection
@section('scripts')
<script>
    function changeRed(){
        if($('#redes').val() == 'banelco'){
            document.getElementById('banelco').style.display = 'block';
            document.getElementById('link').style.display = 'none';
        }else if($('#redes').val() == 'link'){
            document.getElementById('banelco').style.display = 'none';
            document.getElementById('link').style.display = 'block';
        }else{
            document.getElementById('banelco').style.display = 'none';
            document.getElementById('link').style.display = 'none';
        }            
    }
</script>
@endsection
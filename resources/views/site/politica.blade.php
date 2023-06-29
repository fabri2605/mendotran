@extends('layouts.app')
@section('titulo')
    <title> MendoTran </title>
@endsection
@section('contenido')
<main class="entry-main" style="padding:50px !important">
    <div class="blog " id="blog">
<div class="fusion-row" style="min-height: 900px">
    <div id="content" style="width: 100%;">
        <div id="post-14534" class="post-14534 page type-page status-publish hentry">
        <span class="entry-title" style="display: block; font-size: 20px"><b>Política de privacidad</b></span>
        <br/>
        <div class="post-content">
            <p>Esta política de privacidad establece el uso de la aplicación&nbsp;móvil <b>"MendoTran"</b>, creada y mantenida por Gobierno de la Ciudad de Mendoza</p>
    <p>&nbsp;</p>
    <p><b>¿Qué información obtiene el aplicativo y como es utilizada?</b></p>
    <p><em>Información proveída por el usuario</em></p>
    <p>El aplicativo no requiere ningún tipo de registro con Gobierno de Mendoza., pero si requiere que el usuario mantenga una cuenta de Google Play Store (Android) para descargar la aplicación.</p>
    <p>&nbsp;</p>
    <p><em>Información obtenida automáticamente</em></p>
    <p>Adicionalmente, el aplicativo puede recopilar de forma automática otro tipo de información, como: tipo de dispositivo móvil, país del usuario, el sistema operativo del dispositivo móvil e información de cómo se usa el aplicativo a través del servicio de notificaciones.</p>
    <p>&nbsp;</p>
    <p><b>¿El aplicativo obtiene la información precisa y en tiempo real del dispositivo?</b></p>
    <p>El aplicativo interactua con las coordenadas de ubicación del dispositivo para filtrar la información obtenida</p>
    <p>&nbsp;</p>
    <p><b>¿Pueden terceros obtener acceso a la información obtenida por el aplicativo?</b></p>
    <p>Si.&nbsp; Podemos compartir la información proporcionada por el usuario o la obtenida automáticamente en los siguientes casos:</p>
    <ul>
    <li>Cuando sea requerido por la ley.</li>
    <li>Cuando creamos que es necesario para proteger nuestros derechos, proteger su seguridad o la seguridad de otros, investigar fraude o en respuesta a una solicitud del gobierno.</li>
    <li>Con proveedores que trabajan en nuestro nombre y que han aceptado regirse por las reglas establecidas en esta política de privacidad.</li>
    </ul>
    <p>&nbsp;</p>
    <p><b>Recolección automática de datos y publicidad</b></p>
    <p>Podemos trabajar con compañías de analíticos para que nos ayuden a entender como el aplicativo es utilizado, como la frecuencia y duración de uso.</p>
    <p>Podemos trabajar con anunciantes y redes de anunciantes de terceros, quienes necesitan saber como usted interactúa con la publicidad presente en el aplicativo, quienes ayudan a mantener los precios bajos.&nbsp; Los anunciantes y las redes de anunciantes pueden utilizar parte de la información recopilada por el aplicativo.</p>
    <p>&nbsp;</p>
    
    <p><b>Seguridad</b></p>
    <p>Nos preocupamos por &nbsp;salvaguardar la confidencialidad de su información, por lo que contamos con las medidas necesarias para lograr este fin.&nbsp; Por ejemplo, limitamos el acceso a esta información a los empleados y contratistas autorizados que necesitan conocer dicha información para operar, desarrollar o mejorar nuestra aplicación. Tenga en cuenta que aunque nos esforzamos por proveer un nivel de seguridad razonable para manejar y procesar la información, pero ningún sistema de seguridad puede prevenir todas las brechas de seguridad potenciales.</p>
    <p>&nbsp;</p>
    <p><b>Cambios</b></p>
    <p>Esta Política de Privacidad puede ser actualizada de vez en cuando por cualquier razón. Le notificaremos de cualquier cambio en nuestra política de privacidad mediante la publicación de la nueva política de privacidad en esta página.</p>
    <p>&nbsp;</p>
    <p><b>Su Consentimiento</b></p>
    <p>Al utilizar los Servicios, usted está consintiendo a nuestro procesamiento de usuario proporcionada y automáticamente la información de Colección como se establece en esta Política de Privacidad de vez modificado por nosotros. “Proceso “, significa el uso de cookies en un dispositivo de la computadora / de mano o el uso o tocar a la información de cualquier manera, incluyendo, pero no limitado a , recoger, almacenar , borrar , utilizar la combinación y la divulgación de la información, todas las actividades que se llevarán a cabo en Argentina. Si usted reside fuera de los Argentina&nbsp;su información será transferida a Argentina, y se procesa y se almacena allí, bajo los estándares de privacidad de Argentina. mediante el uso de la aplicación y proporcionar información a nosotros, usted consiente en dicha transferencia y procesamiento de , Argentina.</p>
                            </div>
                                                                    </div>
                    </div>
                </div>
            </main>

@endsection
@section('scripts')
    <script>
        function openPage(page){
            if(page == 'saldo'){
                window.open('http://www.miredbus.com.ar/consultaSaldo.htm','_blank');
            }else{
                location.href="/"+page;
            }
            
        }
    </script>
@endsection
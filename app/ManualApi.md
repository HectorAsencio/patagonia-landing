[README.MD](/README.md) > Manual de API

<p align="center">
    <img src="../pic/logo.png">
</p>

## **<center>Manual de API NotifyBoard</center>**

## **Nuestro Proyecto**

**NotifyBoard** es un servicio que trabaja con el framework de Laravel y consiste de un sistema de notificaciones. El software tiene la funcionalidad de enviar alertas de notificaciones para que el usuario pueda revisarlas. También proporciona la funcionalidad de tomar acción sobre estas notificaciones como aprobar, dejar pendiente o rechazarlas.

La aplicación permite el acceso de usuarios de una organización, donde cada usuario tiene acceso a un perfil privado donde podrá ver a su equipo de trabajo, su lista de notificaciones, una visualización detallada de las notificaciones y un menú personal de ayuda y configuración.

## **Contenidos**

- Inicio de sesión
- Crear notificación
- Ver Bandeja de entrada
- Ver mis notificaciones creadas
- Ver equipo
- Cambiar estado de notificación

## **Inicio de Sesión**

Endpoint: /api/login

Genera un token de sesión para el usuario que autentique con las credenciales correctas. Ese token se envía en cada llamada a los distintos endpoints que sean utilizados. Es requerido para poder utilizar el resto de las funcionalidades.

Headers Requeridos:
- Accept: application/json

Body (Form Data):
- email: Correo electronico del usuario.
- password: Contraseña del usuario.

Al ejecutar esta llamada se genera un token de sesión. Ese token debe utilizarse en las solicitudes a los restantes endpoints, utilizando el parametro *Bearer Token*.

    curl --location --request POST 'http://mighty-taiga-25832.herokuapp.com/api/login' \
        --header 'Accept: application/json' \
        --form 'email="usuario@dominio.com"' \
        --form 'password="contraseñasegura"'

## **Crear Notificación**

Endpoint: /api/notificaciones/crear

Se crea una notificación con los parametros indicados. Para el archivo adjunto se utiliza la ruta desde la raíz local. Se debe enviar el Token generado en el paso anterior.

Authorization: *Bearer Token*

Body (Form Data):
- urlFile: Ruta del archivo a adjuntar.
- titulo: Título de la notificación.
- descripción: Descripción generica de la notificación.
- solicitante: ID Usuario de quien realiza la solicitud.
- receptor: ID Usuario de quien la va a recibir.

Para obtener estos datos de los usuarios se expondrá un endpoint adicional.

    curl --location --request POST 'http://mighty-taiga-25832.herokuapp.com/api/notificaciones/crear' -H "Authorization: Bearer ${TOKEN}" \
        --form 'urlFile=@"/home/dev/Documents/adjunto.pdf"' \
        --form 'titulo="Titulo"' \
        --form 'descripcion="Una descripcion medio generica"' \
        --form 'solicitante="4"' \
        --form 'receptor="1"'

## **Ver Bandeja de entrada**

Endpoint: /api/notificaciones/bandeja/{userId}

Al realizar esta llamada se ejecutará el método GET el retornará un listado en formato json con las notificaciones de la bandeja de entrada desde la vista del usuario autenticado.

Authorization: *Bearer Token*

No se requiere pasar ningun dato de formulario, simplemente se debe utilizar el ID del usuario en la URL.

    curl --location --request GET 'http://mighty-taiga-25832.herokuapp.com/api/notificaciones/mias/1' -H "Authorization: Bearer ${TOKEN}" \
        --header 'Accept: application/json'

## **Ver mis notificaciones creadas**

Endpoint: /api/notificaciones/mias/{userId}

Al realizar esta llamada se ejecutará el método GET el cual retornará un listado en formato json con todas las notificaciones creadas por el usuario especificado.

Authorization: *Bearer Token*

    curl --location --request GET 'http://localhost:8000/api/notificaciones/mias/1' \
        --header 'Accept: application/json'

## **Ver equipo**

Endpoint: /api/equipo

Esta llamada ejecutará un método GET al servidor el cual nos proporcionará en formato JSON los perfiles de los que han implementado este software.

Authorization: *Bearer Token*

    curl --location --request GET 'http://mighty-taiga-25832.herokuapp.com/api/equipo' -H "Authorization: Bearer ${TOKEN}"

## **Cambiar estado de notificación**

Endpoint: /api/notificaciones/notificacion/{notiId}/{accion}

Al realizar esta llamada se realizará el cambio de estado de una notificación dependiendo de lo que se introduce en la url en la llave de "acción". Por ejemplo, si se quiere aprobar una notificación se debe ingresar la url "/api/notificaciones/notificacion/1/aprobar" y esta quedará en estado "aprobada".

Las acciones disponibles son "aprobar", "rechazar".

Authorization: *Bearer Token*

    curl --location --request GET 'http://mighty-taiga-25832.herokuapp.com/api/notificaciones/notificacion/28/aprobar' -H "Authorization: Bearer ${TOKEN}"
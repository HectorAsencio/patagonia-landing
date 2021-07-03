Estimado {{ $demo->receiver }}:

A traves de NotifyBoard se le ha enviado una nueva notificación para su información: <b>{{ $demo->titulo }}</b>

Puede revisar el detalle de la notificacion en el siguiente link:

http://mighty-taiga-25832.herokuapp.com/notificaciones/{{ $demo->id }}

Detalle

Gracias,

Atentamente,

{{ $demo->sender }}
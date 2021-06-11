Estimado {{ $demo->receiver }}:

Tiene una nueva notificacion:  "{{ $demo->titulo }}" 

Puede revisar el detalle de la notificacion en el siguiente link:

http://mighty-taiga-25832.herokuapp.com/notificaciones/{{ $demo->id }}

Detalle

Gracias,

Atentamente,

{{ $demo->sender }}
Estimado {{ $demo->receiver }}:

Su solicitud "{{ $demo->titulo }}" ha cambiado al estado: "{{ $demo->estado }}"

Puede revisar el detalle de su solicitud en el siguiente link:

http://mighty-taiga-25832.herokuapp.com/notificaciones/{{ $demo->id }}

Detalle

Gracias,

Atentamente,

{{ $demo->sender }}

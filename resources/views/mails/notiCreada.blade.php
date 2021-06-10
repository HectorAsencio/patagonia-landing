Estimado <i>{{ $demo->receiver }}</i>:<br>
<p>Su solicitud "{{ $demo->noti_titulo }}" ha cambiado al estado: "{{ $demo->noti_estado }}"</p>
 
<p><u>Puedes revisar el detalle de tu solicitud en el siguiente link</u></p>
 
<a href="/notificaciones/{{ $demo->noti_id }}" target="_blank">Detalle<a>
<br/>
<br/>
Gracias,
<br/>
<i>{{ $demo->sender }}</i>
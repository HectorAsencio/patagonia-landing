<br>
Estimado <i>{{ $demo->receiver }}</i>:
<br>
<br>
<p>Su solicitud "<strong>{{ $demo->titulo }}</strong>" ha cambiado al estado: "<strong>{{ $demo->estado }}</strong>"</p><br>
<p>Puedes revisar el detalle de tu solicitud en el siguiente link</p><br>
<a href="http://mighty-taiga-25832.herokuapp.com/notificaciones/{{ $demo->id }}" target="_blank">Detalle<a>
<br>
<br>
<hr>
<br>
<p>Atentamente,</p><br>
<strong><i>{{ $demo->sender }}</i></strong>

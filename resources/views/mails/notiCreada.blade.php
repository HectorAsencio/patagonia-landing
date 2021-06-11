<br>
Estimado <i>{{ $demo->receiver }}</i>:<br>
<p>Tiene una nueva notificacion: "{{ $demo->titulo }}" </p>
 
<p><u>Puede revisar el detalle de la notificacion en el siguiente link.</u></p>
 
<a href="http://mighty-taiga-25832.herokuapp.com/notificaciones/{{ $demo->id }}" target="_blank">Detalle<a>
<br/>
<br/>
Gracias,
<br/>
<i>{{ $demo->sender }}</i>
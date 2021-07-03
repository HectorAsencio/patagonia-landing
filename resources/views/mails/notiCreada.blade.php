<br>
Estimado <i>{{ $demo->receiver }}</i>:<br>
<p>A traves de NotifyBoard se le ha enviado una nueva notificación para su información: <b>{{ $demo->titulo }}</b></p>
 
<p>Puede revisar el detalle de la notificacion en el siguiente link.</p>
 
<a href="http://mighty-taiga-25832.herokuapp.com/notificaciones/{{ $demo->id }}" target="_blank">Detalle<a>
<br/>
<br/>
Gracias,
<br/>
<i>{{ $demo->sender }}</i>
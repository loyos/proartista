<?php 
	if (!empty($nombre) && !empty($apellido)) {
		$persona = $nombre.' '.$apellido;
	} else {
		$persona = $username;
	}
	echo '<p style="color:#c90">¡Hola '.$persona.'!</p>';
	echo '<p> Gracias por formar parte de <span style="color:#c90">Proartista</span>. </p>';
	echo '<p>Para validar tu cuenta haz click en el siguiente enlace <a href="'.FULL_BASE_URL.'/users/validacion_registro/'.$clave.'">'.FULL_BASE_URL.'/users/validacion_registro/'.$clave.'</a></p>';
?>
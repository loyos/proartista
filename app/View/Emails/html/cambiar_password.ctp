<?php
if (!empty($nombre) && !empty($apellido)) {
	$persona = $nombre.' '.$apellido;
} else {
	$persona = $username;
}
echo '<p>¡Hola '.$persona.'!</p>';
echo '<p>Tu nombre de usuario es '.$username.' y tu nueva clave es: '.$clave.', recuerda que puedes cambiarla accesando a tu perfil</p>';
?>
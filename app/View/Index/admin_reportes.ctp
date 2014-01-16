<div class="index box">
		
<div class="subcategory_title Fuente_Texto">
<br>

<?php echo 'Estadisticas'; ?>
</div>
<table style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">
	<tr style= "padding: 10px;">
	<td class="Bold" width="200" valign="top" height="63" align="left">
	<span class="Fuente_Texto">Usuarios registrados: </span>
	<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 16px;">
	<?php echo $usuarios?>
	<br>
	<span class="Fuente_Texto">Publicaciones activas: </span>
	<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 16px;">
	<?php echo $publicaciones_activas?>
	<br>
	<span class="Fuente_Texto">Publicaciones pendientes: </span>
	<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 16px;">
	<?php echo $publicaciones_pendientes?>
	<br>
	<span class="Fuente_Texto">Total de Publicaciones: </span>
	<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 16px;">
	<?php echo $totales?>
	<br>

	</tr>
</table>
<br><br>
<h3>Usuarios sin publicación</h3>
<table style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">
	<tr style= "padding: 10px;">
	<td class="Bold" width="200" valign="top" height="63" align="left"><span class="Fuente_Texto">Nombre </span></td>
	<td class="Bold" width="200" valign="top" height="63" align="left"><span class="Fuente_Texto">Apellido </span></td>
	<td class="Bold" width="200" valign="top" height="63" align="left"><span class="Fuente_Texto">Email </span></td>
	</tr>
	<?php 
	foreach ($usuarios_sin_publicacion as $u) { ?>
		<tr style= "padding: 10px;">
		<td class="Bold" width="200" valign="top" align="left">
		<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 16px;">
		<?php echo $u['User']['nombre'];?>
		</td>
		<td class="Bold" width="200" valign="top" align="left">
		<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 16px;">
		<?php echo $u['User']['apellido'];?>
		</td>
		<td class="Bold" width="200" valign="top"align="left">
		<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 16px;">
		<?php echo $u['User']['email'];?>
		</td>
		</tr>
	<?php } ?>
</table>
</div>
<div class="index box">
	<div class="title_izquierda">
			<?php echo $this->Html->link('Agregar nueva noticia',array(
				'controller' => 'noticias',
				'action' => 'admin_editar'
			));?>
	</div>
	<div class="title">
		<h2>Publicaciones</h2>
	</div>
	<?php
	if (!empty($noticias)){
		foreach ($noticias as $n) {
			echo '<table style= " border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">';
			echo '<tr style="color: #CC9900;"><td style="padding: 10px; text-align:center">Titulo</td><td style="padding: 10px; text-align:center">Descripción breve</td><td style="padding: 10px; text-align:center">Noticia</td><td style="padding: 10px; text-align:center">Acciones</td></tr>';
			echo '<tr>';
			echo '<td style="padding: 10px;">'.$n['Noticia']['titulo'].'</td>';
			echo '<td style="width: 200px;padding: 10px;">'.$n['Noticia']['descripcion_breve'].'</td>';
			echo '<td style="padding: 10px;">'.$n['Noticia']['noticia'].'</td>';
			echo '<td>';
			echo $this->Html->link('Editar',array('action' => 'admin_editar',$n['Noticia']['id']));
			echo '<br>';
			echo $this->Html->link('Eliminar',array('action' => 'admin_eliminar',$n['Noticia']['id']));
			echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br><br>';
		}
	}
	?>
</div>
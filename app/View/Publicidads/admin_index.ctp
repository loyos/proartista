<div class="index box">
	<div class="title_izquierda">
			<?php echo $this->Html->link('Agregar nueva publicidad',array(
				'controller' => 'publicidads',
				'action' => 'admin_editar'
			));?>
	</div>
	<div class="title">
		<h2>Publicidad</h2>
	</div>
	<?php
	if (!empty($publicidades)){
		foreach ($publicidades as $n) {
			echo '<table style= " border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">';
			echo '<tr style="color: #CC9900;"><td style="padding: 10px; text-align:center">Publicidad</td><td style="padding: 10px; text-align:center">Link</td><td style="padding: 10px; text-align:center">Prioridad</td><td style="padding: 10px; text-align:center">Acciones</td></tr>';
			echo '<tr>';
			echo '<td style="padding: 10px;">'.$this->Html->image('publicidad/'.$n['Publicidad']['imagen'],array('width' => '100px')).'</td>';
			echo '<td style="padding: 10px;">'.$n['Publicidad']['url'].'</td>';
			echo '<td style="width: 200px;padding: 10px;">'.$n['Publicidad']['prioridad'].'</td>';
			echo '<td>';
			echo $this->Html->link('Editar',array('action' => 'admin_editar',$n['Publicidad']['id']));
			echo '<br>';
			echo $this->Html->link('Eliminar',array('action' => 'admin_eliminar',$n['Publicidad']['id']));
			echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo '<br><br>';
		}
	}
	?>
</div>
<div class="index box">
	<div class="title_izquierda">
		<?php echo $this->Html->link('Agregar nueva publicación',array(
			'controller' => 'items',
			'action' => 'admin_editar'
		));?>
	</div>
	<div class="title">
	<h2>Publicaciones</h2>
	</div>
	<?php 
		echo $this->element('search_admin');
	?>
		<div class="content_items content_items_publicaciones">
		<table class="publicaciones" border="1">
		<?php
		foreach ($items as $i) {
		?>
			<tr>
			<td width="61" valign="top" height="63">
			<?php 
			echo $this->Html->link($this->Html->image('logos/'.$i['Item']['logo'], array('width'=>'57px','height'=>'57px')),array(
				'controller' => 'items',
				'action' => 'descripcion',$i['Item']['id']
			),array(
				'escape' =>false
			));
			?>
			</td>
			<td class="Bold" valign="top" align="left">
			<span class="Fuente_Texto">NOMBRE:</span>
			<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
			<?php echo $i['Item']['alias']?>
			<br>
			<span class="Fuente_Texto">GENERO:</span>
			<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
			<?php echo $i['Item']['genero']?>
			<br>
			<span class="Fuente_Texto">CIUDAD:</span>
			<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
			<?php echo $i['Item']['ciudad']?>
			</td>
			<td>
			<span class="Fuente_Texto">STATUS:<br></span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php echo $i['Item']['status'];
				if ($i['Item']['status'] == 'pendiente') {
					echo '<br>';
					echo $this->Html->link('activar',array(
						'controller' => 'items',
						'action' => 'admin_editar',$i['Item']['id'],'activar'
					));
					echo '<br>';
					echo $this->Html->link('Enviar un mensaje',array(
						'controller' => 'items',
						'action' => 'admin_pendiente',$i['Item']['id']
					));
				}
				?>
			</td>
			<td>
			<span class="Fuente_Texto">ACCIONES:<br></span>
			<span class="Fuente_Texto">
			<?php echo $this->Html->link('Eliminar',array(
				'controller'=>'items', 'action'=>'admin_eliminar',$i['Item']['id']
			),null,"¿Estás seguro de borrar esta publicación?"
			);
			?></span>
			<br>
			<span class="Fuente_Texto">
			<?php echo $this->Html->link('Editar',array(
				'controller'=>'items', 'action'=>'admin_editar',$i['Item']['id']
			));
			?></span>
			<br>
			<span class="Fuente_Texto">
			<?php echo $this->Html->link('Imágenes para la galeria',array(
				'controller'=>'imagenes', 'action'=>'admin_editar',$i['Item']['id']
			));
			?></span>
			</td>
			</tr>
		<?php
		}
		?>
		</table>
		</div>
	<?php
	//}
	?>
	<div class="paginator">
		<?php echo $this->Paginator->numbers(array('separator' =>'/')); ?>
		</div>
</div>
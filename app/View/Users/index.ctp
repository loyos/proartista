<div class="index box">
	<div class="title_izquierda">
		<?php echo $this->Html->link('Agregar nueva publicación',array(
			'controller' => 'items',
			'action' => 'editar'
		));?>
	</div>
	<div class="title" style="float:left;margin-left: 15%;">
	<h2>Tus publicaciones</h2>
	</div>
	<div class="title_derecha">
		<?php echo $this->Html->link('Actualizar tus datos',array(
			'controller' => 'users',
			'action' => 'editar',$user_id
		));?>
	</div>
	
		<?php
		if (!empty($items)) {
			foreach ($items as $i) {
			?><div class="content_items content_items_publicaciones">
			<table class="publicaciones" border="1">
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
					<?php echo $i['Item']['status']?>
				</td>
				<td>
				<span class="Fuente_Texto">ACCIONES:<br></span>
				<span class="Fuente_Texto">
				<?php echo $this->Html->link('Eliminar',array(
					'controller'=>'items', 'action'=>'eliminar',$i['Item']['id']
				),null,'¿Estás seguro de eliminar esta publicación?');
				?></span>
				<br>
				<span class="Fuente_Texto">
				<?php echo $this->Html->link('Editar',array(
					'controller'=>'items', 'action'=>'editar',$i['Item']['id']
				));
				?></span>
				<br>
				<span class="Fuente_Texto">
				<?php echo $this->Html->link('Imágenes para la galeria',array(
					'controller'=>'imagenes', 'action'=>'editar',$i['Item']['id']
				));
				?></span>
				</td>
				</tr>
				</table>
			</div>
			<?php
			}
		} else {
			?>
			<div class="content_items content_items_publicaciones">
			<h3>No tienes publicaciones hasta el momento, para agregar una haz <?php echo $this->Html->link('click aqui', array('controller' => 'items',
			'action' => 'editar'), array('class' => 'link'))?> </h3>
			</div>
			<?php
		}
		?>
		
</div>
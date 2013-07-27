<div class="index box">
	<div class="title" style="margin-left: auto; margin-right: auto; width: 200px;">
	<h2>Mi Perfil</h2>
	</div>
	
	<div>
		<?php echo $this->Html->link('Editar',array(
			'controller' => 'users',
			'action' => 'editar',$user_id
		));?>
	</div>
	<div class="content_items content_items_publicaciones profile">
		<table width = "400px" style = "margin-left: auto; margin-right: auto;" >
			<tr>
				<td  class = "amarillito" >Nombre: </td> <td><?php echo $user_info['User']['nombre']; ?></td>  <td class = "amarillito" >Email: </td> <td><?php echo $user_info['User']['email']; ?></td>  
			</tr>
			<tr>
				<td class = "amarillito">Apellido: </td> <td><?php echo $user_info['User']['apellido']; ?></td> <td class = "amarillito">Teléfono: </td> <td><?php echo $user_info['User']['telefono']; ?></td>
			</tr>
		</table>
	</div>
	
	
	
	<div class="title" style="margin-left: auto; margin-right: auto; width: 200px;">
	<h2>Mis publicaciones</h2>
	</div>
	
	<div>
		<?php echo $this->Html->link('Agregar nueva publicación',array(
			'controller' => 'items',
			'action' => 'editar'
		));?>
	</div>
	
		<?php
		if (!empty($items)) {
			foreach ($items as $i) {
			?><div class="content_items content_items_publicaciones">
			<table class="publicaciones" border="1">
				<tr>
				<td >
				<?php 
				if(empty($i['Item']['logo'])){
						echo $this->Html->link($this->Html->image('no_image.jpg', array('width'=>'80px','height'=>'80px')),array(
						'controller' => 'items',
						'action' => 'descripcion',$i['Item']['id']
					),array(
						'escape' =>false
					));
				}else{
					echo $this->Html->link($this->Html->image('logos/'.$i['Item']['logo'], array('width'=>'80px','height'=>'80px')),array(
						'controller' => 'items',
						'action' => 'descripcion',$i['Item']['id']
					),array(
						'escape' =>false
					));
				}
				?>
				</td>
				<td class="Bold" valign="top" align="left">
				<span class="Fuente_Texto">NOMBRE:</span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php echo $i['Item']['alias']?>
				<br>
				<span class="Fuente_Texto">
				<?php
				if ($i['Subcategoria']['id'] == 1) {
					echo 'BANDA. GÉNERO:';
				} else {
					echo $i['Subcategoria']['alias'];
				}?>
				</span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php 
				if ($i['Subcategoria']['id'] == 1) {
					echo $i['Item']['genero'];
				}?>
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
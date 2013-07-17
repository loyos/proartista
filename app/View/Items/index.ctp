<div class="index box">
		
		<?php
			if(!empty($items)){
				echo $this->element('search', array(
					'genero' => $generos
				));
				// debug($items);
			}
		?>
		
		<div class="subcategory_title Fuente_Texto">
					<br>
					<?php echo $titulo['Subcategoria']['alias']; ?>
		</div>
		<?php
			if(empty($items)){
				echo '<div class= "aviso"> Lo sentimos! no hay publicaciones en esta categoría. </div>';
			}
		?>
		<table style= "width: 100%;">
		<?php 
		//debug($items);
		foreach ($items as $item) {
		?>
		
				<?php 
		if (!empty($item['Item'])){
			$hay_activos = false;
			
				if($item['Item']['status'] == 'activo') {
					$hay_activos = true;
				}
			
			if ($hay_activos) {
			?>
			<tr><td>
				<div class="content_items">
			<table>
			<?php
			$count = 1;
			$size = count($item['Item']);
				if($item['Item']['status'] == 'activo') {
			?>
				<?php
				// if ($count== 1 || ($count-1) % 3 === 0){
					// echo '<tr>';
				// };
				?>
				
				<tr>
				<td>
				<table style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">
				<tr style= "padding: 10px;">
				<td width="61" valign="top" height="63">
				<?php
				if(empty($item['Item']['logo'])){
						echo $this->Html->link($this->Html->image('no_image.jpg', array('width'=>'57px','height'=>'57px')),array(
						'controller' => 'items',
						'action' => 'descripcion',$item['Item']['id']
					),array(
						'escape' =>false
					));
				}else{
					echo $this->Html->link($this->Html->image('logos/'.$item['Item']['logo'], array('width'=>'57px','height'=>'57px')),array(
						'controller' => 'items',
						'action' => 'descripcion',$item['Item']['id']
					),array(
						'escape' =>false
					));
				}
				?>
				</td>
				<td class="Bold" width="200" valign="top" height="63" align="left" width="200">
				<span class="Fuente_Texto">NOMBRE:</span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php echo $item['Item']['alias']?>
				<br>
				<span class="Fuente_Texto">
				<?php if ($item['Subcategoria']['categoria_id'] == 1) {
					echo 'GÉNERO:';
				} else {
					echo 'CATEGORIA:';
				}?>
				</span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php 
				if ($item['Subcategoria']['categoria_id'] == 1) {
					echo $item['Item']['genero'];
				} else {
					echo $item['Subcategoria']['alias'];
				}?>
				<br>
				<span class="Fuente_Texto">CIUDAD:</span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php echo $item['Item']['ciudad']?>
				<br>
				</td>
				<td class="Bold" width="auto" valign="top" height="63" align="left">
					<span class="Fuente_Texto">Interés en:</span>
					<?php echo $item['Item']['descripcion']?>
				</td>
				</tr>
				</table>
				</td>
				</tr>
				
				<?php
				// if ($count % 3 === 0 || $size == $count) {
					// echo '</tr>';
				// };
				$count = $count+1;
				?>
			<?php
				}
			
			?>
			</table>
			</div>
			</td></tr>
			
		<?php
			}
		}
		}
		?>
		</table>
		<div class="paginator">
		<?php echo $this->Paginator->numbers(array('separator' =>'/')); ?>
		</div>
</div>

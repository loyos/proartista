<div class="index box">
		
		<?php
			if($titulo['Subcategoria']['id'] != '999'){
				echo $this->element('search');
			}
		?>
		<div class="subcategory_title Fuente_Texto">
			<br>
			
			<?php echo $titulo['Subcategoria']['alias']; ?>
		</div>
		<?php
		if(empty($items)){
			echo '<div class= "aviso" style = "text-align: center"> Lo sentimos! no hay publicaciones o categorías que coincidan con esta búsqueda. </div>';
		}
		?>
		<table style= "width: 100%;">
		<?php 
		// debug($items);
		foreach ($items as $item) {
		// debug($item['Item']);
		?>
		
				<?php 
		if (!empty($item['Item'])){
			$hay_activos = false;
				if($item['Item']['status'] == 'activo') {
					$hay_activos = true;
				}
			
			if ($hay_activos) {
			// debug("pass");
			?>
			<tr><td>
				<div class="content_items">
				<!--<div class="subcategory_title Fuente_Texto"> -->
					<?php //echo $item['Subcategoria']['alias']; ?>
				<!--</div>-->
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
				<table style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 30px;
				padding-right: 30px;">
				<tr style= "padding: 10px;">
				<td width="61" valign="top" height="63">
				<?php
				if(empty($item['Item']['logo'])){
						echo $this->Html->link($this->Html->image('no_image.jpg', array('width'=>'80px','height'=>'80px')),array(
						'controller' => 'items',
						'action' => 'descripcion',$item['Item']['id']
					),array(
						'escape' =>false
					));
				}else{
					echo $this->Html->link($this->Html->image('logos/'.$item['Item']['logo'], array('width'=>'80px','height'=>'80px')),array(
						'controller' => 'items',
						'action' => 'descripcion',$item['Item']['id']
					),array(
						'escape' =>false
					));
				}
				?>
				<td style= "padding-top: 0px; font-size: 18px;"> <span class = "Fuente_Texto"> <?php echo $item['Subcategoria']['alias'];  ?></span></td>
				</td>
				<td class="Bold" width="200" valign="top" height="63" align="left">
				<span class="Fuente_Texto">NOMBRE:<br></span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php echo strtoupper($item['Item']['alias']);?>
				<br>
				<span class="Fuente_Texto">
				<?php
				if ($item['Subcategoria']['id'] == 1) {
					echo 'BANDA:<br>';
				} else {
					echo 'ESPECIALIDAD<br>';
				}?>
				</span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php 
				if ($item['Subcategoria']['id'] == 1) {
					echo $item['Item']['genero'];
				}else {
					echo $item['Item']['genero'];
				}?>
				<br>
				<span class="Fuente_Texto">CIUDAD:</span>
				<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php echo $item['Item']['ciudad']?>
				<br>
				</td>
				<td class="Bold" width="auto" valign="top" height="63" align="left">
					<span class="Fuente_Texto">Descripción breve:<br></span>
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

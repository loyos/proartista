<div class="index">
<div class="title">
<h2>Categorías</h2>
</div>
<div class="content_list">
<?php

foreach ($subcategorias as $sc) {
	if (!empty($sc['Subcategoria'])) { ?>
		<div class="subcategory_title Fuente_Texto">
			<?php
			echo $sc['Categoria']['alias']; 
			echo '<div class="agregar_subcategoria">';
			echo $this->Html->link('Agregar una subcategoria en '.$sc['Categoria']['alias'],array('action'=>'admin_editar',0,$sc['Categoria']['id']));
			echo '</div>';
			?>
			<br><br>
		</div>
	<?php
		$i = 1;
		echo '<table class="publicaciones" style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">';
		foreach ($sc['Subcategoria'] as $s) { 
			if ($i == 1 || ($i-1)%3 == 0) { 
				echo '<tr>';
			}
			?>
			<td><?php echo $s['alias'] ?></td>
			<td>
				<?php echo $this->Html->link("Eliminar",array('action' => 'admin_eliminar',$s['id']),null,"¿Estás seguro de borrar esta categoria?");
				echo '<br>';
				echo $this->Html->link("Editar",array('action' => 'admin_editar',$s['id'])); ?>
			</td>
			<?php
			if($i%3 == 0){
				echo '</tr>';
			}
			$i=$i+1;
		}
		echo '</table>';
		echo '<br><br>';
	} 
}

?>
</div>
</div>
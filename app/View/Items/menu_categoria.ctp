<div class= "box categoria_menu">
	<?php
		echo $this->element('regresar_home').'<br>';
		foreach($categorias_menu as $categoria){
			// debug($categoria);
			$cat_id = $categoria['Categoria']['id'];
			echo "<div class= 'title_big Fuente_Texto'> ";
				echo $categoria['Categoria']['alias']. "<br>";
			echo "</div>";
				foreach($categoria['Subcategoria'] as $sub){
					// debug($sub);
					echo "<div class = 'subcategory_title'>";
						echo $this->Html->link($sub['alias'], array('controller' => 'items', 'action' => 'index', $sub['id'], $cat_id)). "<br>";
					echo "</div>";
				}
		}
	?> 

</div>
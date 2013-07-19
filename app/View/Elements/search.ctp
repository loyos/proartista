<div class= "search">
	<?php
		echo $this->Form->create('Item', array(
			'url' => array_merge(array('action' => 'find'), $this->params['pass'])
			));
			echo "<table><tr>";
			echo "<td>";
			echo "Nombre";
			echo "</td>";
			echo "<td>";
			echo $this->Form->input('alias', array('div' => false, 'label' => false));
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Ciudad";
			echo "</td>";
			echo "<td>";
			echo $this->Form->input('ciudad', array('div' => false, 'label' => false,
				'options' => array(
					null => 'Todas',
					'caracas' => 'Caracas',
					'valencia' => 'Valencia'
				)));
			echo "</td></tr>";
			if($titulo['Subcategoria']['alias'] == 'BANDAS'){
				echo "<tr><td>";
				echo "Género";
				echo "</td>";
				echo "<td>";
				echo $this->Form->input('genero', array('div' => false, 'label' => false
					));
			}else{
				echo "<tr><td>";
				echo "Especialidad";
				echo "</td>";
				echo "<td>";
				echo $this->Form->input('especialidad', array('div' => false, 'label' => false
					));
			}
			echo "</td></tr>";
			echo "</table>";
			echo $this->Form->hidden('subcategoria_id', array('value' => $titulo['Subcategoria']['id']));
			echo $this->Form->hidden('status', array('value' => 'activo'));
			echo $this->Form->submit(__('Buscar'), array('div' => false, 'class' => 'button'));
			echo $this->Form->end();
	?>
</div>
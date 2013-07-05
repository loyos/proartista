<?php 
	echo $this->Form->create('Item', array(
		'url' => array_merge(array('controller' => 'users', 'action' => 'admin_index'), $this->params['pass'])
	));
	echo "<table><tr>";
			echo "<td>";
			echo "Nombre";
			echo "</td>";
			echo "<td>";
			echo $this->Form->input('alias', array('div' => false, 'label' => false));
			echo "</td></tr>";
			
			echo "<tr><td>";
			echo "Estatus";
			echo "</td>";
			echo "<td>";
			echo $this->Form->input('status', array('div' => false, 'label' => false,
				'options' => array(
					null => 'Todos',
					'activo' => 'Activo',
					'pendiente' => 'Pendiente'
				)));
			echo "</td></tr>";
			echo "</table>";
	echo $this->Form->submit(__('Search'), array('div' => false));
	echo $this->Form->end();

?>
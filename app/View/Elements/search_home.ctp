<div class= "search_home">
	<?php
		echo $this->Form->create('Item', array(
			'url' => array_merge(array('action' => 'find', '999'), $this->params['pass'])
			));
			
			echo $this->Form->submit(__('Buscar'), array('div' => false, 'class' => 'boton_campo'));
			echo $this->Form->input('alias', array('div' => false, 'label' => false, 'class' => 'campo'));
			
			// echo $this->Form->hidden('subcategoria_id', array('value' => '999'));
			echo $this->Form->hidden('status', array('value' => 'activo'));
			
			echo $this->Form->end();
	?>
</div>
<div class="box index">
	<div class="login_form">
	<?php
	echo '<div class="title">';
	echo '<h2>Escribe un mensaje para ser enviado al usuario</h2>';
	echo '</div>';
	echo $this->Form->create('Item');
	echo $this->Form->input('mensaje',array(
		'type' => 'textarea'
	));
	echo $this->Form->submit('Enviar', array('class' => 'button'));
	echo $this->Form->end;
	?>
	</div>
</div>
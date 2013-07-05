<div class="box index">
	<div class = "login_form">
		<h3 style="color:#C90"> Introduce tu email </h3>
		<?php
		echo $this->Form->create('User');
		echo $this->Form->input('email',array(
			'label' => 'Email '
		));
		echo '<br>';
		echo $this->Form->submit('Restablecer contraseña', array('class' => 'button'));
		echo $this->Form->end;
		?>
	</div>
</div>
<div class="box index">
	<div class = "login_form">
		<?php
		echo $this->Session->flash('auth');
		echo $this->Form->create('User');
		echo '<table><tr><td>';
		echo 'Nombre de Usuario:';
		echo '</td><td>';
		echo $this->Form->input('username',array(
			'label' => false
		));
		echo '</td><tr><td>';
		echo 'Password:</td><td>';
		echo $this->Form->input('password',array(
			'label' => false
		));
		echo '</td></tr></table>';
		echo $this->Form->submit('Entrar', array('class' => 'button'));
		echo $this->Form->end;
		echo '<br>';
		echo '<div style="text-align:center">';
		echo $this->Html->link('¿Olvidaste tu contraseña?',array('controller' => 'users', 'action'=>'cambiar_password'));
		echo '</div>';
		?>
	</div>
</div>
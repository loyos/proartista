<div class="box index">
	<div class= "login_form">
		<?php
		//echo $this->Session->flash('auth');
		echo $this->Form->create('User');
		echo '<table><tr><td>';
		echo 'Nombre de Usuario:';
		echo '</td><td>';
		echo $this->Form->input('username',array(
			'label' => false
		));
		echo '</td>';
		echo '<tr><td>Password:</td><td>';
		echo $this->Form->input('password',array(
			'label' => false
		));
		echo '</td></tr>';
		echo '<tr><td>Email:</td><td>';
		echo $this->Form->input('email',array(
			'label' => false
		));
		echo '</td></tr>';
		echo '<tr><td>Nombre:</td><td>';
		echo $this->Form->input('nombre',array(
			'label' => false
		));
		echo '</td></tr>';
		echo '<tr><td>Apellido:</td><td>';
		echo $this->Form->input('apellido',array(
			'label' => false
		));
		echo '</td></tr>';
		echo '<tr><td>Telefono:</td><td>';
		echo $this->Form->input('telefono',array(
			'label' => false
		));
		echo '</td></tr>';
		echo '</table>';
		echo $this->Form->submit('Registrar', array('class' => 'button'));
		echo $this->Form->end;
		?>
	</div>	
</div>
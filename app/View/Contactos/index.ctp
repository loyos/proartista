<?php 
echo '<div class="index box">';
echo '<div class="title">';
echo '<h2>Envíanos tus datos y serás contactado</h2>';
echo '</div>';
echo '<div class = "contenido">';
echo '<div class = "contacto_form">';
echo $this->Form->create('Contacto');
echo '<table>';
echo '<tr><td>Nombre</td>';
echo '<td>';
echo $this->Form->input('nombre',array(
	'label' => false
));
echo '</td></tr>';
echo '<tr><td>Apellido</td>';
echo '<td>';
echo $this->Form->input('apellido',array(
	'label' => false
));
echo '</td></tr>';
echo '<tr><td>Email</td>';
echo '<td>';
echo $this->Form->input('email',array(
	'label' => false
));
echo '</td></tr>';
echo '<tr><td>Mensaje</td>';
echo '<td>';
echo $this->Form->input('mensaje',array(
	'label' => false
));
echo '</td></tr></table>';
echo $this->Form->submit('Enviar', array('class' => 'button'));
echo $this->Form->end;
echo "</div>";
?>

<div class = "contacto_info">
	Para información adicional o soporte, escríbenos a proartistamr@gmail.com.
</div>
<div class= "chiclet"></div>
<?php echo "</div>";?>



<?php
echo '</div>';
?>
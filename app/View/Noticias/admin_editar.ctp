<div class="index box">
<div class="title_izquierda">
	<?php echo $this->Html->link('<<Regresar',array(
			'action' => 'admin_index'
		));
		?>
</div>
<div class="title">
<h2><?php echo $titulo; ?></h2>
</div>
<?php
echo $this->Form->create('Noticia');
echo '<table>';
echo '<tr>';
echo '<td>Título</td>';
echo '<td>';
echo $this->Form->input('titulo',array(
	'label' => false
));

echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Descripcion breve</td>';
echo '<td>';
echo $this->Form->input('descripcion_breve',array(
	'label' => false
));
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Noticia</td>';
echo '<td>';
echo $this->Form->input('noticia',array(
	'label' => false
));
echo '</td>';
echo '</tr>';
echo '</table>';
echo $this->Form->submit('Guardar', array('class' => 'button'));
echo $this->Form->end;
?>
</div>
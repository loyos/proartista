<div class="box index">
<div class="login_form">
<?php
echo $this->Form->create(null, array('url' => '/categorias/admin_editar'));
echo $this->Form->input('Subcategoria.alias');
echo $this->Form->input('Subcategoria.id',array(
	'type' => 'hidden'
));
if (!empty($categoria_id)) {
	echo $this->Form->input('Subcategoria.categoria_id',array(
		'type' => 'hidden',
		'value' => $categoria_id
	));
}
echo $this->Form->submit('Hecho', array('class' => 'button'));
echo $this->Form->end;
?>
</div>
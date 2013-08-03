<div class= "search_home">
	<?php
		echo $this->Form->create('Item', array(
			'url' => array_merge(array('action' => 'find', '999'), $this->params['pass'])
			));
			
			echo $this->Form->input('alias', array('div' => false, 'label' => false, 'class' => 'campo'));
			echo $this->Form->submit('lupa.png', array('div' => false, 'class' => 'boton_campo'));
			echo $this->Form->hidden('status', array('value' => 'activo'));
			
			echo $this->Form->end();
	?>
</div>

<script>

	if($('.campo').val() == ''){
		$('.campo').val('Buscar');
	}
	$('.campo').on('focus', function(){
		var $this = $(this);
		if($this.val() == 'Buscar'){
			$this.val('');
		}
	});
	$('.campo').on('blur', function(){
		var $this = $(this);
		if($this.val() == ''){
			$this.val('Buscar');
		}
	});

</script>
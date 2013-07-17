<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		
	});
</script>
<div class="index box">
	<?php
		echo $this->Form->create(null);
	?>
	<table style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">
		<tr style= "padding: 10px;">
			<td>
			Quiénes somos:
			</td>
		</tr>
		<tr>
			<td>
				<?php
				echo $this->Form->input('Config.quienes_somos',array(
					'label' => false
				));
				?>
			</td>
		</tr>
	</table>
	<br><br>
	<table style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">
		<tr style= "padding: 10px;">
			<td>
			Políticas de privacidad:
			</td>
		</tr>
		<tr>
			<td>
				<?php
				echo $this->Form->input('Config.politicas',array(
					'label' => false
				));
				?>
			</td>
		</tr>
	</table>
	<br><br>
	<table style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">
		<tr style= "padding: 10px;">
			<td>
			Preguntas Frecuentes:
			</td>
		</tr>
		<tr>
			<td>
				<?php
				echo $this->Form->input('Config.terminos',array(
					'label' => false
				));
				?>
			</td>
		</tr>
	</table>
		<?php
		echo $this->Form->submit('Guardar',array('class'=>'button'));
		echo $this->Form->end();
		?>
</div>
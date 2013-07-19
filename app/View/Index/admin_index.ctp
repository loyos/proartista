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
			Como empezar:
			</td>
		</tr>
		<tr>
			<td>
				<?php
				echo $this->Form->input('Config.como_empezar',array(
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
			Principio del quienes somos:
			</td>
		</tr>
		<tr>
			<td>
				<?php
				echo $this->Form->input('Config.index_quienes_somos',array(
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
			Frase de la página principal:
			</td>
		</tr>
		<tr>
			<td>
				<?php
				echo $this->Form->input('Frase.frase',array(
					'label' => false,
					'value' => null
				));
				?>
			</td>
		</tr>
	</table>
	
		<?php
		echo $this->Form->submit('Guardar',array('class'=>'button'));
		echo $this->Form->end();
		?>
		<br><br>
		<table style= "width: 688px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px;">
		<tr>
			<td style="color:#c90">Frase</td><td style="color:#c90">Acción</td>
		</tr>
		<?php 
		foreach ($frases as $frase) {
			?>
			<tr>
				<td style="vertical-align:middle"><?php echo $frase['Frase']['frase'] ?></td>
				<td style="vertical-align:sub"><?php echo $this->Html->link('Eliminar',array(
					'action' => 'admin_eliminar_frase',$frase['Frase']['id']
				));?></td>
			</tr>
			<?php
		} 
		?>
	</table>
</div>
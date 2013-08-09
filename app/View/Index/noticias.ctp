<div class="index box">
<?php echo $this->element('regresar_home'); ?>
	<?php if (empty($id)) { ?>
	<div class="noticia" style="display:none">
	<?php
	} else { ?>
	<div class="noticia">
	<?php } ?>
		<table style= "width: 561px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px; padding-right:10px; margin-auto;" class="tabla_noticia">
			<tr style= "padding: 10px;">
			<td class="Bold" valign="top" align="left">
			<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
				<?php
				if (!empty($id)) {
					$cadena = '<span class="Fuente_Texto">'.$noticia['Noticia']['titulo'].'</span><br><span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">'.$noticia['Noticia']['noticia'];
					echo $cadena;
				}
				?>
			</span>
			</td>
			</tr>
		</table>
	</div>
	<table style= "width: 100%;">
		<?php 
		foreach ($noticias as $n) {
			if (!empty($n['Noticia'])){
				?>
				<tr><td>
				<table style="margin:auto">
				<?php
					$count = 1;
				?>
					<tr>
					<td>
					<table style= "width: 561px; border-bottom: 1px dotted #EA8C00; padding-top: 10px; padding-bottom: 10px; background-color: #232222; border: 1px solid #444242; border-radius: 10px; padding-left: 10px; padding-right:10px;">
					<tr style= "padding: 10px;">
					<td class="Bold" valign="top" align="left">
					<span class="Fuente_Texto">Titulo:</span>
					<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
					<?php echo $n['Noticia']['titulo']?>
					<br>
					<span class="Fuente_Texto">Descripcion breve:</span>
					<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
					<?php echo $n['Noticia']['descripcion_breve']?>
					</span>
					<br>
					</td>
					<td style="text-align:right">
					<?php $timestamp = strtotime($n['Noticia']['fecha']); ?>
					<span class="Fuente_Texto" style="color: #FFF; font-weight: normal; font-size: 14px;">
					<?php echo date('d/m/Y', $timestamp);?> </span>
					</span>
					<br>
					<span class="Fuente_Texto ver_mas" id="<?php echo $n['Noticia']['id'] ?>"><a href="#">+Ver más</a></span>
					</td>
					</tr>
					</table>
					</td>
					</tr>
				</table>
				</td></tr>
			<?php
			}
		}
		?>
		</table>
</div>
<script>
$('.ver_mas').click(function(){
	id = $(this).attr('id');
	$.ajax({
		type: "POST",
		url: '<?php echo FULL_BASE_URL.'/index/buscar_noticia.json' ?>',
		//url: '<?php echo FULL_BASE_URL.'/'.basename(dirname(APP)).'/index/buscar_noticia.json' ?>',
		data: { id: id},
		dataType: "json"
	}).done(function( msg ) {
		$('.noticia table tr td span').html(msg);
	});
	
	$('.noticia').fadeIn(1100,function(){});
});
</script>
<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: '/web_proartista/img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		var ancho = $('.slide img').css('width');
		console.debug(ancho);
		});
	</script>
<div class="index box" style = "height: auto;">
<?php echo $this->element('regresar_home'). '<br>'; ?>
<div class = "marco_slider">
<div class="container_slider">
	<div id="slides">
		<div class="slides_container">
				<div class="slide">
						<div class = "prueba">
							<?php echo $this->Html->image('logos/'.$item['Item']['logo'], array('height'=>'250px', 'max-width' => '100%')); ?>
						</div>
				</div>
				<?php
				foreach ($item['Imagen'] as $imagen) { ?>
					<div class="slide">
						<div class = "prueba">
							<?php echo $this->Html->image('galeria/'.$imagen['imagen'], array('height'=>'250px', 'max-width' => '100%')); ?>
						</div>
					</div>
				<?php
				}
			?>
	</div>
		<?php echo $this->Html->image('img/arrow-prev.png', array('width' => '24px', 'height' => '43', 'class' => 'prev')); ?>
		<?php echo $this->Html->image('img/arrow-next.png', array('width' => '24px', 'height' => '43', 'class' => 'next')); ?>
	</div>
</div>
</div>
<div class="container_right">
	<div class="title_descripcion" style = "text-align: center;">
		<span class="title_span" style = "width: 500px;"><?php echo $item['Subcategoria']['alias'] ?>:</span> <br><br>
		<span style="color:white"><?php echo $item['Item']['alias'] ?></span>
	</div>
	<br>
	<br>
	
</div>
<div class = "container_info">
	<div class="content_descripcion">
		<?php
		 echo '<div class = "des_left" style = "float: left">';
		if (!empty($item['Item']['genero'])) {
			echo '<p>';
			echo '<span class="title_span">Genero:</span>';
			echo '</p>';
			echo '<p>';
			echo '<span class="descripcion_span">'.$item['Item']['genero'].'</span>';
			echo '</p>';
		}
		if (!empty($item['Item']['especialidad'])) {
			echo '<span class="title_span">Especialidad:</span>'; echo '<br>';
			echo '<span class="descripcion_span">'.$item['Item']['especialidad'].'</span>';
		}
		if (!empty($item['Item']['ciudad'])) {
			echo '<p>';
			echo '<span class="title_span">Ciudad:</span>'; echo '<br>';
			echo '<span class="descripcion_span">'.$item['Item']['ciudad'].'</span>';
			echo '</p>';
		}
		if (!empty($item['Item']['email'])) {
			echo '<p>';
			echo '<span class="title_span">Email:</span>'; echo '<br>';
			echo '<span class="descripcion_span"><a href="mailto:'.$item['Item']['email'].'">'.$item['Item']['email'].'</a></span>';
			echo '</p>';
		}
		if (!empty($item['Item']['experiencia'])) {
			
			echo '<span class="title_span">Experiencia:</span>'; echo '<br>';
			echo '<span class="descripcion_span">'.$item['Item']['experiencia'].'</span>';
			echo '<br><br>'; 
		}
		if (!empty($item['Item']['descripcion'])) {
			echo '<span class="title_span">Descripción breve:</span>'; echo '<br>';
			echo '<span class="descripcion_span">'.$item['Item']['descripcion'].'</span>';
		}
		if (!empty($item['Item']['direccion'])) {
			echo '<span class="title_span">Dirección:</span>'; echo '<br>';
			echo '<span class="descripcion_span">'.$item['Item']['direccion'].'</span>';
		}
		 echo '</div>';
		 
		 echo '<div class = "des_right" style = "float: right">';
		if (!empty($item['Item']['telefono'])) {
			echo '<p>';
			echo '<span class="title_span">Tlf:</span>'; echo '<br>';
			echo '<span class="descripcion_span">'.$item['Item']['telefono'].'</span>';
			echo '</p>';
		}
		if (!empty($item['Item']['twitter'])) {
			echo '<p>';
			echo '<span class="title_span">Twitter:</span>'; echo '<br>';
			echo '<span class="descripcion_span">'.$item['Item']['twitter'].'</span>';
			echo '</p>';
		}
		if (!empty($item['Item']['video'])) {
			echo '<p>';
			echo '<span class="title_span">Video:</span>'; echo '<br>';
			echo '<span class="descripcion_span"><a href="'.$item['Item']['video'].'" target = "_blank">'.$item['Item']['video'].'</a></span>';
			echo '</p>';
		}
		if (!empty($item['Item']['biografia'])) {
			echo '<span class="title_span">Biografía:</span>'; echo '<br>';
			echo '<span class="descripcion_span">'.$item['Item']['biografia'].'</span>';
			echo '<br><br>'; 
		}
		 echo '</div>';
	?>
</div>
</div>
</div>

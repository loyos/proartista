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
		});
	</script>
<div class="index box">
<div class = "marco_slider">
<div class="container_slider">
	<div id="slides">
		<div class="slides_container">
			<?php
				foreach ($item['Imagen'] as $imagen) { ?>
					<div class="slide">
						<?php echo $this->Html->image('galeria/'.$imagen['imagen'], array('height'=>'250px', 'width' => '350px')); ?>
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
	<div class="title_descripcion">
		<?php echo $item['Item']['alias'];?>
	</div>
	<div class="content_descripcion">
		<?php
		if (!empty($item['Item']['genero'])) {
			echo '<p>';
			echo '<span class="title_span">Genero:</span>';
			echo '<span class="descripcion_span">'.$item['Item']['genero'].'</span>';
			echo '</p>';
		}
		if (!empty($item['Item']['especialidad'])) {
			echo '<span class="title_span">Especialidad:</span>';
			echo '<span class="descripcion_span">'.$item['Item']['especialidad'].'</span>';
		}
		if (!empty($item['Item']['ciudad'])) {
			echo '<p>';
			echo '<span class="title_span">Ciudad:</span>';
			echo '<span class="descripcion_span">'.$item['Item']['ciudad'].'</span>';
			echo '</p>';
		}
		if (!empty($item['Item']['email'])) {
			echo '<p>';
			echo '<span class="title_span">Email:</span>';
			echo '<span class="descripcion_span"><a href="mailto:'.$item['Item']['email'].'">'.$item['Item']['email'].'</a></span>';
			echo '</p>';
		}
		if (!empty($item['Item']['telefono'])) {
			echo '<p>';
			echo '<span class="title_span">Tlf:</span>';
			echo '<span class="descripcion_span">'.$item['Item']['telefono'].'</span>';
			echo '</p>';
		}
		if (!empty($item['Item']['twitter'])) {
			echo '<p>';
			echo '<span class="title_span">Twitter:</span>';
			echo '<span class="descripcion_span">'.$item['Item']['twitter'].'</span>';
			echo '</p>';
		}
		if (!empty($item['Item']['video'])) {
			echo '<p>';
			echo '<span class="title_span">Video:</span>';
			echo '<span class="descripcion_span"><a href="'.$item['Item']['video'].'">'.$item['Item']['video'].'</a></span>';
			echo '</p>';
		}
		if (!empty($item['Item']['biografia'])) {
			echo '<span class="title_span">Bio:</span>';
			echo '<span class="descripcion_span">'.$item['Item']['biografia'].'</span>';
			echo '<br><br>'; 
		}
		if (!empty($item['Item']['experiencia'])) {
			
			echo '<span class="title_span">Experiencia:</span>';
			echo '<span class="descripcion_span">'.$item['Item']['experiencia'].'</span>';
			echo '<br><br>'; 
		}
		if (!empty($item['Item']['descripcion'])) {
			echo '<span class="title_span">Estan en busca:</span>';
			echo '<span class="descripcion_span">'.$item['Item']['descripcion'].'</span>';
		}		
		?>
	</div>
</div>
</div>
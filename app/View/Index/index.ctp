<script type="text/javascript">
	$(document).ready(function(){
		$('#slide_frase').list_ticker({
			speed:8000,
			effect:'slide'
		});		
	})
	</script>
<div class = "introduction">
	<div class = "texto">
		<p><?php echo $config['Config']['index_quienes_somos']?></p>
		<ul id="slide_frase">
			<?php foreach ($frases as $frase) { ?>
			<li><?php echo $frase['Frase']['frase']?></li>
			<?php
			}
			?>
		</ul>
		<br><br>
		<div class = "buttons_index">
		<?php 
		echo $this->Html->link('Como empezar..',array(
			'controller' => 'index',
			'action' => 'como_empezar',
		),array(
			'class' => 'button'
		));
		echo ' ';
		echo $this->Html->link('¿Quiénes somos?',array(
			'controller' => 'index',
			'action' => 'quienes_somos'
		),array(
			'class' => 'button'
		));
		?>
		</div>
		
	</div>
</div>
<div class="banners">
<div class="banner_1 banner" name="musica_menu">
<div class="fondo_menu" id="musica_menu">
	<ul>
		<?php
		foreach ($subcat[0] as $sc) {
			$palabras = explode(" ",$sc['alias']);
			$i = 0;
			$sub_id = $sc['id'];
			echo '<div class="div_palabras">';
			foreach ($palabras as $p) {
				$class_size = "";
				$digits = strlen($p);
				if ($digits == 9) {
					$class_size = "digits_9";
				} elseif ($digits == 10) {
					$class_size = "digits_10";
				} elseif ($digits == 11 ) {
					$class_size = "digits_11";
				} elseif ($digits == 12) {
					$class_size = "digits_12";
				} elseif ($digits >= 13 && $digits <= 14) {
					$class_size = "digits_13";
				} elseif ($digits >= 15) {
					$class_size = "digits_15";
				}
				//if ($i == 0) {
					echo '<li class="'.$class_size.'">';
				//}
				echo $this->Html->link($p,array(
					'controller' => 'items',
					'action' => 'index',$sub_id,0
				),
				array(
					'class' => 'a_banner'
				)
				);
				//if ($i==0) {
				 echo '</li>';
				//}
				$i++;
			}
			echo '</div>';
		}
		?>
	</ul>
</div>
<?php echo $this->Html->Image('musica.jpg', array('class'=>'imagen_index', 'name' => 'musica_menu')); ?>
<?php // echo $this->Html->Image('musica_txt.png', array('class'=>'image_txt')); ?>
</div>
<div class="banner_2 banner" name="escena_menu">
<div class="fondo_menu" id="escena_menu">
	<ul>
		<?php
		foreach ($subcat[1] as $sc) {
			$palabras = explode(" ",$sc['alias']);
			$i = 0;
			$sub_id = $sc['id'];
			echo '<div class="div_palabras">';
			foreach ($palabras as $p) {
				$class_size = "";
				$digits = strlen($p);
				if ($digits == 9) {
					$class_size = "digits_9";
				} elseif ($digits == 10) {
					$class_size = "digits_10";
				} elseif ($digits == 11 ) {
					$class_size = "digits_11";
				} elseif ($digits == 12) {
					$class_size = "digits_12";
				} elseif ($digits >= 13 && $digits <= 14) {
					$class_size = "digits_13";
				} elseif ($digits >= 15) {
					$class_size = "digits_15";
				}
				//if ($i == 0) {
					echo '<li class="'.$class_size.'">';
				//}
				echo $this->Html->link($p,array(
					'controller' => 'items',
					'action' => 'index',$sub_id,0
				),
				array(
					'class' => 'a_banner'
				));
				//if ($i==0) {
				 echo '</li>';
				//}
				$i++;
			}
			echo '</div>';
		}
		?>
	</ul>
</div>
<?php echo $this->Html->Image('escena.jpg', array('class'=>'imagen_index', 'name' => 'escena_menu')); ?>
<?php // echo $this->Html->Image('escena_txt.png', array('class'=>'image_txt')); ?>
</div>
<div class="banner_3 banner" name="servicios_menu">
<div class="fondo_menu" id="servicios_menu">
	<ul>
		<?php
		foreach ($subcat[2] as $sc) {
			$palabras = explode(" ",$sc['alias']);
			$i = 0;
			$sub_id = $sc['id'];
			echo '<div class="div_palabras">';
			foreach ($palabras as $p) {
				$class_size = "";
				$digits = strlen($p);
				if ($digits == 9) {
					$class_size = "digits_9";
				} elseif ($digits == 10) {
					$class_size = "digits_10";
				} elseif ($digits == 11 ) {
					$class_size = "digits_11";
				} elseif ($digits == 12) {
					$class_size = "digits_12";
				} elseif ($digits >= 13 && $digits <= 14) {
					$class_size = "digits_13";
				} elseif ($digits >= 15) {
					$class_size = "digits_15";
				}
				//if ($i == 0) {
					echo '<li class="'.$class_size.'">';
				//}
				echo $this->Html->link($p,array(
					'controller' => 'items',
					'action' => 'index',$sub_id,0
				),
				array(
					'class' => 'a_banner'
				));
				//if ($i==0) {
				 echo '</li>';
				//}
				$i++;
			}
			echo '</div>';
		}
		?>
	</ul>
	
</div>
<?php echo $this->Html->Image('servicios.jpg', array('class'=>'imagen_index', 'name' => 'servicios_menu')); ?>
<?php // echo $this->Html->Image('servicios_txt.png', array('class'=>'image_txt')); ?>
</div>
<div class="banner_4 banner" name="otros_menu">
<div class="fondo_menu" id="otros_menu">
	<ul>
		<?php
		foreach ($subcat[3] as $sc) {
			$palabras = explode(" ",$sc['alias']);
			$i = 0;
			$sub_id = $sc['id'];
			echo '<div class="div_palabras">';
			foreach ($palabras as $p) {
				$class_size = "";
				$digits = strlen($p);
				if ($digits == 9) {
					$class_size = "digits_9";
				} elseif ($digits == 10) {
					$class_size = "digits_10";
				} elseif ($digits == 11 ) {
					$class_size = "digits_11";
				} elseif ($digits == 12) {
					$class_size = "digits_12";
				} elseif ($digits >= 13 && $digits <= 14) {
					$class_size = "digits_13";
				} elseif ($digits >= 15) {
					$class_size = "digits_15";
				}
				//if ($i == 0) {
					echo '<li class="'.$class_size.'">';
				//}
				echo $this->Html->link($p,array(
					'controller' => 'items',
					'action' => 'index',$sub_id,0
				),
				array(
					'class' => 'a_banner'
				));
				//if ($i==0) {
				 echo '</li>';
				//}
				$i++;
			}
			echo '</div>';
		}
		?>
	</ul>
</div>
<?php echo $this->Html->Image('otros.jpg', array('class'=>'imagen_index', 'name' => 'otros_menu')); ?>
<?php // echo $this->Html->Image('otros_txt.png', array('class'=>'image_txt')); ?>
</div>
<div class="banner_5 banner" name="estudios_menu">
<div class="fondo_menu" id="estudios_menu">
	<ul>
		<?php
		foreach ($subcat[4] as $sc) {
			$palabras = explode(" ",$sc['alias']);
			$i = 0;
			$sub_id = $sc['id'];
			echo '<div class="div_palabras">';
			foreach ($palabras as $p) {
				$class_size = "";
				$digits = strlen($p);
				if ($digits == 9) {
					$class_size = "digits_9";
				} elseif ($digits == 10) {
					$class_size = "digits_10";
				} elseif ($digits == 11 ) {
					$class_size = "digits_11";
				} elseif ($digits == 12) {
					$class_size = "digits_12";
				} elseif ($digits >= 13 && $digits <= 14) {
					$class_size = "digits_13";
				} elseif ($digits >= 15) {
					$class_size = "digits_15";
				}
				//if ($i == 0) {
					echo '<li class="'.$class_size.'">';
				//}
				echo $this->Html->link($p,array(
					'controller' => 'items',
					'action' => 'index',$sub_id,0
				),
				array(
					'class' => 'a_banner'
				));
				//if ($i==0) {
				 echo '</li>';
				//}
				$i++;
			}
			echo '</div>';
		}
		?>
	</ul>
</div>
<?php echo $this->Html->Image('estudios.jpg', array('class'=>'imagen_index', 'name' => 'estudios_menu')); ?>
<?php // echo $this->Html->Image('estudios_txt.png', array('class'=>'image_txt')); ?>
</div>
</div>
<div class="actual"> 
	<?php echo $this->Html->link($this->Html->Image("actual.png"),array(
		'action' => 'noticias'
		),
		array('escape' => false)
	);?>
	<table width="438" border="0">
		<?php
		$now = date('Y/m/d');
		foreach ($noticias as $n) {
		// $fecha = explode(' ',$i['Item']['creado']);
		// $fecha=date("d/m/Y",strtotime($fecha[0]));
		?>
		<tr>
			<td width="221" align="left" style="font-size: 12px; font-weight: bold; text-align: left; font-family: 'Arial Black', Gadget, sans-serif; color: #FFF;">
				<span style="color: #F29100; font-weight: bold; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 16px;"><?php echo $n['Noticia']['titulo']?> </span>
				<?php $timestamp = strtotime($n['Noticia']['fecha']); ?>
				<span style="color: #F29100; float: right; font-weight: italic; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 12px;"><?php echo date('d/m/Y', $timestamp);?> </span>
			</td>
		</tr>
		<tr>
			<td  width="221" style="text-align: left; font-size: 14px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color: #FFF;">
			<?php echo $n['Noticia']['descripcion_breve']?>
			<span style="color: #F29100; float: right; font-weight: italic; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 12px;">
			<?php echo $this->Html->link('+Ver mas',array('action' => 'noticias',$n['Noticia']['id']))?> </span>
			</td>
		</tr>
		<tr>
			<td>
			<?php echo $this->Html->image('linea_actual.jpg')?>
			</td>
		</tr>

		<?php
		} ?>
	</table>
</div>

<div class="twitter">
<a class="twitter-timeline"  href="https://twitter.com/Proartistavzla" data-widget-id="290933791449554944">Tweets por @Proartistavzla</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<div class= "chiclet">
</div>

<script>
$(document).ready(function() {
	//Que el menu cambie la imagen al hacer hover
	$(".banner").mouseenter(function(){
			name = $(this).attr("name");
			$('#'+name).css("display",'block');
	});
	$(".banner").mouseleave(function(){
			name = $(this).attr("name");
			$('#'+name).css("display",'none');
	}); 
	$(".div_palabras").mouseenter(function(){
			font = $(this).find('a.a_banner').css("font-size");
			font =font.match(/[0-9]*/);
			font = parseInt(font)+3;
			font = font+'px';
			$(this).find('a.a_banner').css("font-size",font);
			$(this).find('a.a_banner').css("color","#A39B00");
			// $(this).find('a.a_banner').animate({
				// fontSize: font,
			// }, 5, function() {});
			//$(this).find('a.a_banner').css("margin-left","-15px");
	});
	$(".div_palabras").mouseleave(function(){
			font = $(this).find('a.a_banner').css("font-size");
			font =font.match(/[0-9]*/);
			font = parseInt(font)-3;
			$(this).find('a.a_banner').css("font-size",font);
			 $(this).find('a.a_banner').css("color","white");
			// font = font+'px';
						// $(this).find('a.a_banner').animate({
				// fontSize: font,
			// }, 5, function() {});

			//$(this).find('a.a_banner').css("margin-left","0px");
	});
});

</script>
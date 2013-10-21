<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = "ProArtista";
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
	</title>
	<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('style');
		echo $this->Html->css('global');
		echo $this->Html->script('jquery.1.9.1.min');
		echo $this->Html->script('slides.min.jquery');	
		echo $this->Html->script('tiny_mce');
		echo $this->Html->script('ticker00');
		
		// echo $this->fetch('meta');
		// echo $this->fetch('css');
		// echo $this->fetch('script');
	?>
	<link href='http://fonts.googleapis.com/css?family=Sintony:700,400' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
			
		
		<div id="header">
			<?php 
			
			if (empty($user_id)) {
				echo '<div class="sesion">';
				echo $this->Html->link('Iniciar Sesión ',array('controller' => 'users', 'action'=>'login'));
				echo '|';
				echo $this->Html->link(' Registrarse ',array('controller' => 'users', 'action'=>'add'));
				echo '</div>';
			} elseif (!empty($role) && $role=='admin'){
				echo '<div class="sesion_admin">';
				echo $this->Html->link('Página principal ',array('controller' => 'index', 'action'=>'admin_index'));
				echo '|';
				echo $this->Html->link(' Noticias ',array('controller' => 'noticias', 'action'=>'admin_index'));
				echo '|';
				echo $this->Html->link(' Categorías ',array('controller' => 'categorias', 'action'=>'admin_index'));
				echo '|';
				echo $this->Html->link(' Publicidad ',array('controller' => 'publicidads', 'action'=>'admin_index'));
				echo '|';
				echo $this->Html->link(' Publicaciones ',array('controller' => 'users', 'action'=>'admin_index'));
				echo '|';
				echo $this->Html->link(' Estadisticas ',array('controller' => 'index', 'action'=>'admin_reportes'));
				echo '|';
				echo $this->Html->link(' Otros ',array('controller' => 'index', 'action'=>'admin_otros'));
				echo '|';
				echo $this->Html->link(' Cerrar Sesión ',array('controller' => 'users', 'action'=>'logout'));
				echo '</div>';
			} else {
				echo '<div class="sesion_logout">';
				$name = explode(' ', $username);
				echo '<span class = "nombre">'.  $this->Html->link($name[0].' ',array('controller' => 'users', 'action'=>'index')) . '</span>';
				echo '|';
				echo $this->Html->link(' Cerrar Sesión ',array('controller' => 'users', 'action'=>'logout'));
				echo '</div>';
			}
			if (empty($role) || $role != 'admin'){
				echo $this->element('search_home');
			}
			?>
		
			<div class="logo">
				<?php
					echo $this->Html->link($this->Html->Image('logo.png'),array(
						'controller' => 'index','action'=>'index',
						),
						array('escape' => false)
					)
				?>				
			</div>
		
			<div class = "social">	
				<?php
					echo $this->Html->image('logos/twitter_logo.png', array('width' => '25px', 'url' => 'https://twitter.com/Proartistavzla')); 
					echo $this->Html->image('logos/facebook_logo.png', array('width' => '25px', 'url' => 'http://www.facebook.com/pages/Proartista/312370288878275?fref=ts')); 
					echo $this->Html->image('logos/instagram.png', array('width' => '26px', 'url' => 'https://instagram.com/Proartistavzla')); 
				?>
			</div>
			
			<div class="menu">
				<ul>
				<?php
				$class = "li_prim";
				foreach ($categorias as $categoria) { ?>
					<li class=<?php echo $class ?>>
					<?php
					if(strlen($categoria['Categoria']['alias']) > '9'){
						echo "<div class = 'title'>";
					}else{
						echo "<div class = 'small_title'>";
					}
					echo $this->Html->link($categoria['Categoria']['alias'],
						array('controller' => 'items', 'action' => 'menu_categoria', $categoria['Categoria']['id']),
						array('escape' => false));
						echo "</div>";
					$class="";?>
				<?php
				} ?>
				</ul>
			</div>
		</div>
		
		<div id="content">
			<?php
				echo $this->Session->flash();
				echo $this->element('publicidad', array('publicidad' => $publicidad)); // aqui mandaremos el nivel que viene de appcontroller
				echo $this->fetch('content');
			?>
			<div class= "chiclet"></div>
		</div>
	</div>
	<div id="footer">
		<div class = "footer_content">
			<div class= "footer_content_left">
				
				<?php 
				echo $this->Html->link('Políticas, Condiciones y Términos de Privacidad ',array(
					'controller' => 'index',
					'action' => 'politicas',
				),array(
					'class' => ''
				));
				echo '| ';
				echo $this->Html->link('Preguntas Frecuentes',array(
					'controller' => 'index',
					'action' => 'terminos',
				),array(
					'class' => ''
				));
				echo '| ';
				echo $this->Html->link('Contáctanos ',array(
					'controller' => 'contactos',
					'action' => 'index',
				),array(
					'class' => ''
				));
				echo '|';
				echo $this->Html->link(' ¿Quiénes somos?',array(
					'controller' => 'index',
					'action' => 'quienes_somos'
				),array(
					'class' => ''
				));
				?>
					<span style= "margin-left: 30px;">
					
						<?php // echo $this->Html->image('logos/twitter_logo.png', array('width' => '25px', 'url' => 'https://twitter.com/Proartistavzla')); ?>
						<?php // echo $this->Html->image('logos/facebook_logo.png', array('width' => '25px', 'url' => 'http://www.facebook.com/pages/Proartista/312370288878275?fref=ts')); ?>
						<?php // echo $this->Html->image('logos/instagram.png', array('width' => '28px', 'url' => 'https://instagram.com/Proartistavzla')); ?>
					</span>
				</p>
			</div>
			<div class= "logos">				
				Copyright © 2013 Proartista - Rif: J-40263376-9
			</div>
		</div>
	</div>
	<?php  echo $this->element('sql_dump'); ?>
</body>
</html>
<script>
$(document).ready(function() {
	$('.success_flash').delay(4500).fadeOut(1500);
	$('.permanent').click(function(){
		$('.permanent').fadeOut(1500);
	});
 });
	
</script>
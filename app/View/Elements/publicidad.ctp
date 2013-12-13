<div class="publicidad_izq">

	<?php  foreach ($publicidad as $publi) { ?>
		 <div class="barra_publicidad">			
			<?php
				echo $this->Html->image("publicidad/".$publi['Publicidad']['imagen'], array(
					'width' => '215px',
					'height' => '220px',
					'url' => 'https://'. $publi['Publicidad']['url']
				));
			?>
		</div>
	<?php  } ?>
	
</div>
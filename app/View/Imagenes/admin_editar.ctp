<div class="index box">
<div class="title_izquierda">
	<?php echo $this->Html->link('Regresar a mis publicaciones',array(
		'controller' => 'users',
		'action' => 'admin_index'
	));?>
</div>
<div class="title">
<h2>Imágenes</h2>
</div>
<div class="edit_imagenes form_item">
	<?php
	echo $this->Form->create('Imagen', array('type' => 'file','onSubmit' => 'return checkSize();'));
	echo '<table class = "tabla_centrada">';
		echo "<div class= 'image_title'> Imagen Principal </div>";
	echo '<tr><td colspan="3">';
	echo '<table cellspacing="0" cellpadding="10">';
			// echo '<tr><td>';
			// echo 'Imagen principal:';
			// echo '</td><td>';
			if (!empty($this->data['Item']['logo'])){
				echo $this->Html->image('logos/'.$this->data['Item']['logo'], array('width'=>'200px', 'id' => 'upload_logo'));
				echo '</td></tr><tr><td></td><td>';
				$text = "Cambiar foto";
			} else {
				$text = "Agregar foto";
				echo $this->Html->image('no_image.jpg', array('width'=>'200px', 'id' => 'upload_logo'));
				echo '</td></tr><tr><td></td><td>';
			}			
			echo "<div class= 'image_size_warning'> (Tamaño máximo 1.5 MB) </div>";
			echo "<div class='file_wrap'>";
				echo $text;
				echo $this->Form->file('Item.logo_item',array(
				'label' => false,
				'id' => 'upload_logo',
				'onchange' => 'readURL(this)',
				'class' => 'img_principal'
				));
			echo "</div>";
			echo '</td>';
			echo '</tr>';
			 echo '</table>';
			 echo '</table>';
	echo '<table cellspacing="0" cellpadding="10" style = "margin-top: 20px; border-top: 1px solid #F29100" class = "tabla_centrada">';
	echo '<tr><td>';
		if(!empty($imagenes['0']['Imagen']['imagen'])){
			echo "<div class = 'img-close0'>";
				echo $this->Html->image('close-icon.png', array('width'=>'100px', 'class' => 'img-close0', 'url' => array('controller' => 'imagenes', 'action' => 'eliminar', $imagenes['0']['Imagen']['id'], $item_id)));
			echo "</div>";
			echo $this->Html->image('galeria/'.$imagenes['0']['Imagen']['imagen'], array('width'=>'100px', 'id' => 'upload_imagen1'));
		}else{
			echo $this->Html->image('no_image.jpg', array('width'=>'100px','height'=>'100px', 'id' => 'upload_imagen1', 'class' => 'img_centro'));	
		}		
	echo '</td><td>';
		if(!empty($imagenes['1']['Imagen']['imagen'])){
			echo "<div class = 'img-close0'>";
				echo $this->Html->image('close-icon.png', array('width'=>'100px', 'class' => 'img-close0', 'url' => array('controller' => 'imagenes', 'action' => 'eliminar', $imagenes['1']['Imagen']['id'], $item_id)));
			echo "</div>";
			echo $this->Html->image('galeria/'.$imagenes['1']['Imagen']['imagen'], array('width'=>'100px', 'id' => 'upload_imagen2'));
		}else{
			echo $this->Html->image('no_image.jpg', array('width'=>'100px','height'=>'100px', 'id' => 'upload_imagen2', 'class' => 'img_centro'));
		}		
	echo '</td><td>';
		if(!empty($imagenes['2']['Imagen']['imagen'])){
			echo "<div class = 'img-close0'>";
				echo $this->Html->image('close-icon.png', array('width'=>'100px', 'class' => 'img-close0', 'url' => array('controller' => 'imagenes', 'action' => 'eliminar', $imagenes['2']['Imagen']['id'], $item_id)));
			echo "</div>";
			echo $this->Html->image('galeria/'.$imagenes['2']['Imagen']['imagen'], array('width'=>'100px', 'id' => 'upload_imagen3'));
		}else{
			echo $this->Html->image('no_image.jpg', array('width'=>'100px','height'=>'100px', 'id' => 'upload_imagen3', 'class' => 'img_centro'));
		}		
		echo '</td><td>';
			if(!empty($imagenes['3']['Imagen']['imagen'])){
			echo "<div class = 'img-close0'>";
				echo $this->Html->image('close-icon.png', array('width'=>'100px', 'class' => 'img-close0', 'url' => array('controller' => 'imagenes', 'action' => 'eliminar', $imagenes['3']['Imagen']['id'], $item_id)));
			echo "</div>";			
			echo $this->Html->image('galeria/'.$imagenes['3']['Imagen']['imagen'], array('width'=>'100px', 'id' => 'upload_imagen4'));
		}else{
			echo $this->Html->image('no_image.jpg', array('width'=>'100px','height'=>'100px', 'id' => 'upload_imagen4', 'class' => 'img_centro'));
		}
		
	echo '</td></tr>';
	echo '<tr><td>';
	echo "<div class='file_wrap'>";
		echo "Seleccionar";
		echo $this->Form->file('galeria_imagen.',array(
			'label' => 'Agrega una imágen',
			'id' => 'upload_imagen1',
			'class' => 'img_principal',
			'onchange' => 'readURL(this)',
			'multiple' => 'multiple',
	));
	echo '</div>';
	echo '</td>';
	echo '<td>';
	echo "<div class='file_wrap'>";
		echo "Seleccionar";
		echo $this->Form->file('galeria_imagen.',array(
			'label' => 'Agrega una imágen',
			'id' => 'upload_imagen2',
			'class' => 'img_principal',
			'onchange' => 'readURL(this)',
			'multiple' => 'multiple'
	));
	echo '</div>';
	echo '</td>';
	echo '<td>';
	echo "<div class='file_wrap'>";
		echo "Seleccionar";
		echo $this->Form->file('galeria_imagen.',array(
			'label' => 'Agrega una imágen',
			'id' => 'upload_imagen3',
			'class' => 'img_principal',
			'onchange' => 'readURL(this)',
			'multiple' => 'multiple'
	));
	echo '</div>';
	echo '</td>';
	echo '<td>';
	echo "<div class='file_wrap'>";
		echo "Seleccionar";
		echo $this->Form->file('galeria_imagen.',array(
			'label' => 'Agrega una imágen',
			'id' => 'upload_imagen4',
			'class' => 'img_principal',
			'onchange' => 'readURL(this)',
			'multiple' => 'multiple'
	));
	echo '</div>';
	echo '</td>';
	// echo '<td>'.$this->Html->link('Eliminar','#',array('class'=>'link_limpiar','onclick'=>'limpiar_imagen()')),'</td>';
	echo '</tr>';
	echo '</table>';
	
	
	
/*	if (!empty($imagenes)) {
		echo '<h2 class="subtitle">Imágenes</h2>';
		echo '<table style="margin-top:62px">';
		$count = 1;
		foreach ($imagenes as $i) {
			if ($count== 1 || ($count-1) % 5 === 0){
				echo '<tr>';
			};
			echo '<td class="td_img">'.$this->Html->image('galeria/'.$i['Imagen']['imagen'], array('width'=>'70px')).'</td>';
			echo '<td>'.$this->Html->link('Eliminar',array('controller'=>'imagenes','action'=>'eliminar',$i['Imagen']['id'],$item_id));
			echo '</td>';
			if ($count % 5 === 0) {
				echo '</tr>';
			};
			$count = $count+1;
		};
		echo '</table>';
	}; */
	
	echo $this->Form->input('item_id',array(
		'type'=>'hidden',
		'value' => $item_id
	));
	
	echo "<div class= 'loading'>";
		echo "Subida de archivo(s) en proceso..." ."<br>";
		echo $this->Html->image('loading.gif', array('width'=>'100px', 'id' => 'loading'));
	echo "</div>";
	
	echo $this->Form->submit('Salvar', array('class' => 'button'));
	echo '<div class="submit link_listo">';
	echo $this->Html->link('Siguiente',array('controller'=>'users','action'=>'admin_index'), array('class'=>'button','style'=>"margin-top:10px"));	
	echo '</div>';
	echo $this->Form->end;
	?>
</div>
</div>
<script type="text/javascript">


function readURL(input) {
	var id_wrap = '#' + input.id;
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$(id_wrap).attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

function checkSize()
{	loading();
	var max_img_size = 1503600;
    var input = document.getElementById("upload_logo");
    // check for browser support (may need to be modified)
    if(input.files && input.files.length == 1)
    {           
        if (input.files[0].size > max_img_size) 
        {
			var clon = $("#upload_logo").clone(); 
			$("#upload_logo").replaceWith(clon);
            alert("La imagen principal no puede superar 1.5 MB");
			$('.loading').fadeIn(1000);
            return false;
        }
    }
	
	var input2 = document.getElementById("upload_imagen");
  
    if(input2.files && input2.files.length == 1)
    {           
        if (input2.files[0].size > max_img_size) 
        {
			var clon = $("#upload_imagen").clone(); 
			$("#upload_imagen").replaceWith(clon);
			$('.loading').fadeIn(1000);
            alert("Las imágenes no pueden superar 1.5 MB");
            return false;
        }
    }
	
    
}

function limpiar_logo() {
	var clon = $("#upload_logo").clone(); 
	$("#upload_logo").replaceWith(clon);
	return true
}

function limpiar_imagen() {
	var clon = $("#upload_imagen").clone(); 
	$("#upload_imagen").replaceWith(clon);
	return true;
}

function loading(){
	$('.loading').fadeIn(1000);
}
</script>
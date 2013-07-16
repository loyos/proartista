<div class="index box">
<div class="title">
<h2>Imágenes</h2>
</div>
<div class="edit_imagenes form_item">
	<?php
	echo $this->Form->create('Imagen', array('type' => 'file','onSubmit' => 'return checkSize();'));
	echo '<table>';
	echo '<tr><td colspan="3">';
	echo '<table cellspacing="0" cellpadding="10">';
			echo '<tr><td>';
			echo 'Publicidad:';
			echo '</td><td>';
			$text = "Agregar foto";
			echo $this->Html->image('no_image.jpg', array('width'=>'200px', 'id' => 'upload_imagen'));
			echo '</td></tr><tr><td></td><td>';
					
			echo "<div class='file_wrap'>";
				echo $text;
				echo $this->Form->file('Publicidad.imagen_publicidad',array(
				'label' => false,
				'id' => 'upload_imagen',
				'onchange' => 'readURL(this)',
				'class' => 'img_principal'
				));
			echo "</div>";
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Prioridad</td>';
			echo '<td>';
			echo $this->Form->input('Publicidad.prioridad',array(
				'label' => false,
				'options' => array(
					'1' => 'Home',
					'2' => 'Lista de publicaciones',
					'3' => 'Descripcion de las publicaciones'
				)
			));
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Link</td>';
			echo '<td>';
			echo $this->Form->input('Publicidad.url',array('label'=>false));
			echo '</td>';
			echo '</tr>';
			 echo '</table>';
			 echo '</table>';
 '</table>';
	echo "<div class= 'loading'>";
		echo "Subida de archivo(s) en proceso..." ."<br>";
		echo $this->Html->image('loading.gif', array('width'=>'100px', 'id' => 'loading'));
	echo "</div>";
	
	echo $this->Form->submit('Guardar', array('class' => 'button'));
	echo $this->Form->end;
	?>
</div>
</div>
<script type="text/javascript">


function readURL(input) {
	var max_img_size = 1503600;
	var id_wrap = '#' + input.id;
	if (input.files && input.files[0]) {
		if (input.files[0].size > max_img_size) {
			alert("La imagen no puede superar 1.5 MB");
            return false;
		}
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
    var input = document.getElementById("upload_imagen");
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
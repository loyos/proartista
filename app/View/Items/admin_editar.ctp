<script>
function genero(){
	var x = new Array();
	<?php
		for ($i = 0, $total = count($subcat_musica); $i < $total; $i ++)
		echo "\nx[$i] = '$subcat_musica[$i]';";
	?>
	var subcat = $('#subcategoria').val();
	var genero_uno = $('#genero1').val();
	var genero_dos = $('#genero2').val();
	var genero_tres = $('#genero3').val();
	if (jQuery.inArray(subcat, x) >= 0) {
		$.ajax({
				type: "POST",
				url: "/items/genero.json",
				data: { genero_uno: genero_uno, genero_dos: genero_dos, genero_tres : genero_tres },
			dataType: "json"
		}).done(function( msg ) {
			// alert( "Data Saved: " + msg[1].Genero.nombre);
			$('.musica_genero1').fadeIn(100);
			$('#genero1 option').remove();
			$('#genero1').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
			$.each(msg, function(i,a){
				if (a.Genero.nombre == '<?php echo $gen_uno?>') {
					$('#genero1').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre));
				} else {
					$('#genero1').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre));
				}
			});
		});
		genero1_change();
	} else {
		$('.musica_genero1').fadeOut(100);
		$('.musica_genero2').fadeOut(100);
		$('.musica_genero3').fadeOut(100);
	}
	
	//genero3_change();
}

function genero1_change(){
	var genero_uno = $('#genero1').val();
	var genero_dos = $('#genero2').val();
	if (genero_uno == null) {
		genero_uno = '<?php echo $gen_uno?>';
	}
	if (genero_dos == null) {
		genero_dos = '<?php echo $gen_dos?>';
	}
	$('.musica_genero2').fadeIn(100);
	$.ajax({
			type: "POST",
			url: "/items/genero1_change.json",
			data: { genero_uno: genero_uno},
		dataType: "json"
	}).done(function( msg ) {
		// alert( "Data Saved: " + msg[1].Genero.nombre);
		$('#genero2 option').remove();
		$('#genero2').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
		// $('#genero3 option').remove();
		// $('#genero3').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
		$.each(msg, function(i,a){
			if (a.Genero.nombre == genero_dos) {
					$('#genero2').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
			} else {
				$('#genero2').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
			}
		});
	});
	genero2_change();
}

function genero2_change(){
	
	var genero_dos = $('#genero2').val();
	var genero_uno = $('#genero1').val();
	var genero_tres = $('#genero3').val();
	if (genero_dos == null) {
		genero_dos = '<?php echo $gen_dos?>';
	}
	if (genero_uno == null) {
		genero_uno = '<?php echo $gen_uno?>';
	}
	if (genero_tres == null) {
		genero_tres = '<?php echo $gen_tres?>';
	}
		$('.musica_genero3').fadeIn(100);
		$.ajax({
				type: "POST",
				url: "/items/genero2_change.json",
				data: { genero_uno: genero_uno, genero_dos:genero_dos},
			dataType: "json"
		}).done(function( msg ) {
			// alert( "Data Saved: " + msg[1].Genero.nombre);
			$('#genero3 option').remove();
			$('#genero3').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
			$.each(msg, function(i,a){
				if (a.Genero.nombre == genero_tres) {
						$('#genero3').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				} else {
					$('#genero3').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				}
			});
		});
		if (genero_dos != null && genero_dos != ''){
			$.ajax({
					type: "POST",
					url: "/items/genero2_change.json",
					data: { genero_uno: genero_dos, genero_dos: genero_tres},
				dataType: "json"
			}).done(function( msg ) {
				// alert( "Data Saved: " + msg[1].Genero.nombre);
				$('#genero1 option').remove();
				$('#genero1').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
				// $('#genero3 option').remove();
				// $('#genero3').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
				
				$.each(msg, function(i,a){
					
					if (a.Genero.nombre == genero_uno) {
							$('#genero1').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
					} else {
						$('#genero1').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
					}
				});
			});
		} else {
			$.ajax({
					type: "POST",
					url: "/items/genero1_change.json",
					data: { genero_uno: genero_tres},
				dataType: "json"
			}).done(function( msg ) {
				// alert( "Data Saved: " + msg[1].Genero.nombre);
				$('#genero1 option').remove();
				$('#genero1').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
				// $('#genero3 option').remove();
				// $('#genero3').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
				
				$.each(msg, function(i,a){
					
					if (a.Genero.nombre == genero_uno) {
							$('#genero1').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
					} else {
						$('#genero1').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
					}
				});
			});
		}
		if (genero_dos != null && genero_dos != ''){
			$.ajax({
					type: "POST",
					url: "/items/genero2_change.json",
					data: { genero_uno: genero_uno, genero_dos: genero_tres},
				dataType: "json"
			}).done(function( msg ) {
				// alert( "Data Saved: " + msg[1].Genero.nombre);
				$('#genero2 option').remove();
				$('#genero2').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
				// $('#genero3 option').remove();
				// $('#genero3').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
				
				$.each(msg, function(i,a){
					
					if (a.Genero.nombre == genero_dos) {
							$('#genero2').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
					} else {
						$('#genero2').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre));
					}
				});
			});
		} 
		genero3_change();
}

function genero3_change(){
	
	var genero_dos = $('#genero2').val();
	var genero_uno = $('#genero1').val();
	var genero_tres = $('#genero3').val();
	if (genero_dos == null) {
		genero_dos = '<?php echo $gen_dos?>';
	}
	if (genero_uno == null) {
		genero_uno = '<?php echo $gen_uno?>';
	}
	if (genero_tres == null) {
		genero_tres = '<?php echo $gen_tres?>';
	}
	if (genero_tres != null && genero_tres != ''){
		$.ajax({
				type: "POST",
				url: "/items/genero2_change.json",
				data: { genero_uno: genero_tres, genero_dos:genero_dos},
			dataType: "json"
		}).done(function( msg ) {
			$('#genero1 option').remove();
			$('#genero1').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
			$.each(msg, function(i,a){
				
				if (a.Genero.nombre == genero_uno) {
						$('#genero1').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				} else {
					$('#genero1').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				}
			});
		});
	} else {
		$.ajax({
				type: "POST",
				url: "/items/genero1_change.json",
				data: { genero_uno: genero_dos},
			dataType: "json"
		}).done(function( msg ) {
			$('#genero1 option').remove();
			$('#genero1').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
			$.each(msg, function(i,a){
				
				if (a.Genero.nombre == genero_uno) {
						$('#genero1').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				} else {
					$('#genero1').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				}
			});
		});
	}
	if (genero_tres != null && genero_tres != ''){
		$.ajax({
				type: "POST",
				url: "/items/genero2_change.json",
				data: { genero_uno: genero_tres, genero_dos: genero_uno},
			dataType: "json"
		}).done(function( msg ) {
			$('#genero2 option').remove();
			$('#genero2').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
			$.each(msg, function(i,a){
				
				if (a.Genero.nombre == genero_dos) {
						$('#genero2').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				} else {
					$('#genero2').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				}
			});
		});
	} else { 
		$.ajax({
				type: "POST",
				url: "/items/genero1_change.json",
				data: { genero_uno: genero_uno},
			dataType: "json"
		}).done(function( msg ) {
			$('#genero2 option').remove();
			$('#genero2').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
			$.each(msg, function(i,a){
				
				if (a.Genero.nombre == genero_dos) {
						$('#genero2').append($("<option selected=selected ></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				} else {
					$('#genero2').append($("<option></option>").attr("value", a.Genero.nombre).text(a.Genero.nombre)); 
				}
			});
		});
	}
}

function direccion(){
	// FULL_BASE_URL.'/'.basename(dirname(APP)).'/articulos/buscar_acabado.json'
	var subcategoria = $('#subcategoria').val();
	$.ajax({
			type: "POST",
			url: "/items/direccion.json",
			data: { subcategoria: subcategoria},
		dataType: "json"
	}).done(function( msg ) {
		if(msg == '1'){
			$('.direccion').fadeIn(100);
		}else{
			$('.direccion').fadeOut(100);
		}
		// $('#subcategoria').append($("<option></option>").attr("value", '').text('Selecciona un Género'));
	});

}
</script>
<div class="index box">
<div class="title_izquierda">
	<?php echo $this->Html->link('<<Regresar',array(
			'controller' => 'users',
			'action' => 'index'
		));
		?>
</div>
<div class="title">
<h2><?php echo $title?></h2>
</div>
<div class= "form_item">
	<?php
		echo $this->Form->create('Item', array('type' => 'file','onSubmit' =>'return vaciar()'));
		echo '<table width= 100%>';
		echo '<tr><td>Artista</td><td>';
		echo $this->Form->input('alias', array(
			'label' => false,
			// 'value' => '',
			'after' => '*'
		));
		echo '</td>';
		echo '<td>Email</td><td>';
		echo $this->Form->input('email', array(
			'label' => false,
			'after' => '*'
		));
		echo '</td>';
		// echo '<td>Categoría</td>';
		// echo '<td>';
		// echo $this->Form->input('subcategoria_id', array(
			// 'label' => false,
			// 'id' => 'subcategoria',
			// 'after' => '*'
		// ));
		// echo '</td>';
		echo '</tr>';
		echo '<tr><td>Ciudad</td><td>';
		echo $this->Form->input('ciudad', array(
			'label' => false,
			'after' => '*'
		));
		echo '</td>';
		echo '<td>Twitter</td><td>';
		echo $this->Form->input('twitter', array(
			'label' => false
		));
		echo '</td>';
		/*echo '<td>Email</td><td>';
		echo $this->Form->input('email', array(
			'label' => false,
			'value' => $datos_usuario['User']['email'],
			'after' => '*'
		));
		echo '</td>';*/
		echo '</tr>';
		echo '<tr>';
		echo '<td>Categoría</td>';
		echo '<td>';
		echo $this->Form->input('subcategoria_id', array(
			'label' => false,
			'id' => 'subcategoria',
			'after' => '*'
		));
		echo '</td>';
		echo '<td>Facebook</td><td>';
		echo $this->Form->input('facebook', array(
			'label' => false,
		));
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td class="musica_genero1" style="vertical-align:top">1º Genero</td><td class="musica_genero1" style="vertical-align:top">';
		echo $this->Form->input('genero_uno', array(
			'id' => 'genero1',
			'label' => false,
			'type' => 'select',
			'after' => '*'
		));
		echo '</td>';
		
		echo '<td>Página web</td><td>';
		echo $this->Form->input('web', array(
			'label' => false
		));
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<td class="musica_genero2" style="vertical-align:top">2º Genero</td><td class="musica_genero2" style="vertical-align:top">';
			echo $this->Form->input('genero_dos', array(
			'id' => 'genero2',
			'label' => false,
			'type' => 'select'
			));
			
			echo '<td>Video</td><td>';
			echo $this->Form->input('video', array(
				'label' => false
			));
			echo '</td>';	
		echo '</tr>';
		
		echo '<tr>';
			echo '<tr><td class="musica_genero3" style="vertical-align:top">3º Genero</td><td class="musica_genero3" style="vertical-align:top">';
			echo $this->Form->input('genero_tres', array(
			'id' => 'genero3',
			'label' => false,
			'type' => 'select'
			));
			echo '</td>';
			
			echo '<td style="vertical-align:top" >Biografía</td><td>';
			echo $this->Form->input('biografia', array(
			'label' => false,
			'id' =>'bio',
			'class' => 'textarea'
		));
			echo '<span style = "font-size: 14px; ">Caracteres restantes: </span>' . '<div id= "remainbio" class= "contador" >	</div>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<td style="vertical-align:top">Especialidad</td><td style="vertical-align:top">';
			echo $this->Form->input('especialidad', array(
			'label' => false,
			'id' =>'especialidad'
		));
		echo '</td>';
		echo '<td style="vertical-align:top">Descripción breve</td><td style="vertical-align:top">';
		echo $this->Form->input('descripcion', array(
			'label' => false,
			'id' => 'en_busca',
			'after' => '*',
			'cols' => '20',
		));
		echo '<span style = "font-size: 14px; ">Caracteres restantes: </span>' . '<div id= "remain" class= "contador" >	</div>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr class= "direccion" style="vertical-align:top"><td> Dirección: </td><td style="vertical-align:top">';
		echo $this->Form->input('direccion', array(
			'label' => false,
			'id' => 'direccion'
		));
		echo '</td>';
		echo '</tr>';
		echo '</table>';
		if ($origen == 'edit') {
			echo $this->Form->input('id',array(
				'type' =>'hidden'
			));
		}
		
		echo '<span style= "font-size: 14px;"> - Los campos señalados con <span style = "color:red; font-size: 30px; position: relative; top: 10px;"> * </span> son obligatorios </span><br>';
		echo '<span style= "font-size: 14px;"> - En "Especialidad", introduce palabras claves específicas de tu categoría, de esta forma facilitas que tu publicación sea encontrada.  </span><br>'; 
		echo $this->Form->submit('Siguiente', array('class' => 'button'));
		echo $this->Form->end;
		
		// echo $this->Html->link('Ver género','#',array('onclick'=>'genero();')); // para hacer pruebas llamando a funciones javascript!!
	?>
</div>
</div>
<script>
$(document).ready(function() {
	if($('#bio').val() == ''){
		$('#bio').val('(Por ejemplo: Historia, experiencia, estudios realizados, actividades recientes y a futuro y/o presentaciones)');
	}
	$('#bio').on('focus', function(){
		var $this = $(this);
		if($this.val() == '(Por ejemplo: Historia, experiencia, estudios realizados, actividades recientes y a futuro y/o presentaciones)'){
			$this.val('');
		}
	});
	$('#bio').on('blur', function(){
		var $this = $(this);
		if($this.val() == ''){
			$this.val('(Por ejemplo: Historia, experiencia, estudios realizados, actividades recientes y a futuro y/o presentaciones)');
		}
	});
	
	if($('#especialidad').val() == ''){
		$('#especialidad').val('(Palabras clave)');
	}
	$('#especialidad').on('focus', function(){
		var $this = $(this);
		if($this.val() == '(Palabras clave)'){
			$this.val('');
		}
	});
	$('#especialidad').on('blur', function(){
		var $this = $(this);
		if($this.val() == ''){
			$this.val('(Palabras clave)');
		}
	});
	
	if($('#en_busca').val() == ''){
		$('#en_busca').val('(Define brevemente tu arte y lo que ofreces)');
	}
	$('#en_busca').on('focus', function(){
		var $this = $(this);
		if($this.val() == '(Define brevemente tu arte y lo que ofreces)'){
			$this.val('');
		}
	});
	$('#en_busca').on('blur', function(){
		var $this = $(this);
		if($this.val() == ''){
			$this.val('(Define brevemente tu arte y lo que ofreces)');
		}
	});

	characterLimit = 60;
	
	 // $('#remain').html(characterLimit);
	 
	 $('#en_busca').bind('keyup', function(){  
        var charactersUsed = $(this).val().length;  
          
        if(charactersUsed > characterLimit){  
            charactersUsed = characterLimit;  
            $(this).val($(this).val().substr(0, characterLimit));  
            $(this).scrollTop($(this)[0].scrollHeight);  
        }  
          
        var charactersRemaining = characterLimit - charactersUsed;  
          
        $('#remain').html(charactersRemaining);
    }); 
	
	characterLimitbio = 700;
	
	 // $('#remain').html(characterLimit);
	 
	 $('#bio').bind('keyup', function(){
        var charactersUsed = $(this).val().length;  
          
        if(charactersUsed > characterLimitbio){  
            charactersUsed = characterLimitbio;  
            $(this).val($(this).val().substr(0, characterLimitbio));  
            $(this).scrollTop($(this)[0].scrollHeight);  
        }  
          
        var charactersRemaining = characterLimitbio - charactersUsed;
          
        $('#remainbio').html(charactersRemaining);
    });
	
	
});

function vaciar() {
	
	if($('#en_busca').val() == '(Rellene este cuadro solo si se encuentra en búsqueda de un integrante o artista, así como otro tipo de personal especializado para cumplir sus intereses)'){
			$('#en_busca').val('');
	}
	if($('#bio').val() == '(Por ejemplo: Historia, experiencia, estudios realizados, actividades recientes y a futuro y/o presentaciones)'){
			$('#bio').val('');
	}
}



function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

$('#subcategoria').change(function(){
	genero();
	direccion();
});

$('#genero1').change(function(){
	genero1_change();
});

$('#genero2').change(function(){
	genero2_change();
});

$('#genero3').change(function(){
	genero3_change();
});

genero();

</script>
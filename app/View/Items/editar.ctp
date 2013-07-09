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
		echo '<table>';
		echo '<tr><td>Nombre</td><td>';
		echo $this->Form->input('alias', array(
			'label' => false,
			'value' => $datos_usuario['User']['nombre'],
			'after' => '*'
		));
		echo '</td>';
		echo '<td>Categoría</td><td>';
		echo $this->Form->input('subcategoria_id', array(
			'label' => false,
			'id' => 'subcategoria',
			'after' => '*'
		));
		echo '</td></tr>';
		echo '<tr><td>Ciudad</td><td>';
		echo $this->Form->input('ciudad', array(
			'label' => false,
			'after' => '*'
		));
		echo '</td>';
		echo '<td>Email</td><td>';
		echo $this->Form->input('email', array(
			'label' => false,
			'value' => $datos_usuario['User']['email'],
			'after' => '*'
		));
		echo '</td></tr>';
		echo '<tr><td>Teléfono</td><td>';
		echo $this->Form->input('telefono', array(
			'label' => false,
			'value' => $datos_usuario['User']['telefono']
		));
		echo '</td>';
		echo '<td>Facebook</td><td>';
		echo $this->Form->input('facebook', array(
			'label' => false,
		));
		echo '</td></tr>';
		echo '<tr><td>Twitter</td><td>';
		echo $this->Form->input('twitter', array(
			'label' => false
		));
		echo '</td>';
		echo '<td>Página web</td><td>';
		echo $this->Form->input('web', array(
			'label' => false
		));
		echo '</td></tr>';
		echo '<tr><td>Video</td><td>';
		echo $this->Form->input('video', array(
			'label' => false
		));
		echo '</td>';
		echo '<td class="musica_genero1">1º Genero</td><td class="musica_genero1">';
		echo $this->Form->input('genero_uno', array(
			'id' => 'genero1',
			'label' => false,
			'type' => 'select',
			'after' => '*'
		));
		echo '</td>';
		echo '<tr><td></td><td></td><td class="musica_genero2">2º Genero</td><td class="musica_genero2">';
		echo $this->Form->input('genero_dos', array(
			'id' => 'genero2',
			'label' => false,
			'type' => 'select'
		));
		echo '</td></tr>';
		echo '<tr><td></td><td></td><td class="musica_genero3">3º Genero</td><td class="musica_genero3">';
		echo $this->Form->input('genero_tres', array(
			'id' => 'genero3',
			'label' => false,
			'type' => 'select'
		));
		echo '</td></tr>';
		echo '<tr>';
		echo '<td>Biografía</td><td>';
		echo $this->Form->input('biografia', array(
			'label' => false,
			'id' =>'bio'
		));
		echo '</td><td>En busca de</td><td>';
		echo $this->Form->input('descripcion', array(
			'label' => false,
			'id' => 'en_busca'
		));
		echo '</td></tr>';
		echo '</table>';
		if ($origen == 'edit') {
			echo $this->Form->input('id',array(
				'type' =>'hidden'
			));
		}
		
		echo '<span style= "font-size: 14px;"> Los campos señalados con <span style = "color:red; font-size: 30px; position: relative; top: 10px;"> * </span> son obligatorios </span><br>'; 
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
	if($('#en_busca').val() == ''){
		$('#en_busca').val('(Rellene este cuadro solo si se encuentra en búsqueda de un integrante o artista, así como otro tipo de personal especializado para cumplir sus intereses)');
	}
	$('#en_busca').on('focus', function(){
		var $this = $(this);
		if($this.val() == '(Rellene este cuadro solo si se encuentra en búsqueda de un integrante o artista, así como otro tipo de personal especializado para cumplir sus intereses)'){
			$this.val('');
		}
	});
	$('#en_busca').on('blur', function(){
		var $this = $(this);
		if($this.val() == ''){
			$this.val('(Rellene este cuadro solo si se encuentra en búsqueda de un integrante o artista, así como otro tipo de personal especializado para cumplir sus intereses)');
		}
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
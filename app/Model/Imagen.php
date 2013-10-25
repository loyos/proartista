<?php

class Imagen extends AppModel {
    var $name = 'Imagen';
     
   var $belongsTo = array(
        'Item' => array(
            'className'    => 'Item',
            'foreignKey'   => 'item_id'
        )
    );
	
	function generar_codigo() {
	$codigo = '';
		for ($i=1; $i<=4; $i++) {
			$numero_aleatorio = rand(1,9);
			$codigo = $codigo.$numero_aleatorio;
		}
		return($codigo);
	}
}


?>
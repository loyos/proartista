<?php

class Contacto extends AppModel {
    var $name = 'Contacto';
	var $validate = array(
		'nombre' => array(
			'rule' => 'notEmpty',
			'message' => 'Este campo no puede ser vacío'
		),
		'apellido' => array(
			'rule' => 'notEmpty',
			'message' => 'Este campo no puede ser vacío'
		),
		'email' => array(
			'rule' => 'notEmpty',
			'message' => 'Este campo no puede ser vacío'
		),
		'mensaje' => array(
			'rule' => 'notEmpty',
			'message' => 'Este campo no puede ser vacío'
		)
	);
}



?>
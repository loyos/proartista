<?php

class Subcategoria extends AppModel {
    var $name = 'Subcategoria';
     
   var $belongsTo = array(
        'Categoria' => array(
            'className'    => 'Categoria',
            'foreignKey'   => 'categoria_id'
        )
    );
	public $hasMany = array(
        'Item' => array(
            'className'  => 'Item',
			'foreignKey'    => 'subcategoria_id',
        )
    );
}

?>
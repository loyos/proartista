<?php

class Genero extends AppModel {
    var $name = 'Genero';
	var $hasAndBelongsToMany = array(
        'Item' =>
            array('className' => 'Item',
            )
    );
}

?>
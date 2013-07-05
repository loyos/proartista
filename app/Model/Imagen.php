<?php

class Imagen extends AppModel {
    var $name = 'Imagen';
     
   var $belongsTo = array(
        'Item' => array(
            'className'    => 'Item',
            'foreignKey'   => 'item_id'
        )
    );
}

?>
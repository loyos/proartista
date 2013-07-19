<?php
class Item extends AppModel {
    var $name = 'Item';
	var $actsAs = array('Search.Searchable');

	public $filterArgs = array(
        'alias' => array('type' => 'like'),
		'ciudad' => array('type' => 'like'),
		'subcategoria_id' => array('type' => 'value'),
		'genero' => array('type' => 'like'),
		'status' => array('type' => 'like'),
		'especialidad' => array('type' => 'like'),
		);

	public function orConditions($data = array()) {
        $filter = $data['filter'];
        $cond = array(
            'OR' => array(
                $this->alias . '.logo LIKE' => '%' . $filter . '%',
                $this->alias . '.logo LIKE' => '%' . $filter . '%',
            ));
        return $cond;
    }

	public $hasAndBelongsToMany = array('Genero' => array(
				'className' => 'Genero',
            )
    );


   public $belongsTo = array(
        'Subcategoria' => array(
            'className'    => 'Subcategoria',
            'foreignKey'   => 'subcategoria_id'
        ),
		'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'user_id'
        )
    );
	public $hasMany = array(
        'Imagen' => array(
            'className'  => 'Imagen',
			'foreignKey'    => 'item_id',
        )
    );

	public $validate = array(
        // 'alias' => array(
            // 'required' => array(
                // 'rule' => array('notEmpty'),
                // 'message' => 'El nombre es obligatorio'
            // )
        // ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El email es obligatorio'
            )
        ),
		'ciudad' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El email es obligatorio'
            )
        ),
		'subcategoria_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El email es obligatorio'
            )
        ),
		'genero_uno' => array(
            'required' => array(
                'rule' => array('notEmpty_genero'),
                'message' => 'El género es obligatorio'
            )
        ),
        // 'telefono' => array(
            // 'valid' => array(
                // 'rule' => array('notEmpty'),
                // 'message' => 'El telefono es obligatorio',
                // 'allowEmpty' => false
            // )
        // ),
		// 'descripcion' => array(
            // 'required' => array(
                // 'rule' => array('notEmpty'),
                // 'message' => 'Este campo no puede estar vacío'
            // )
        // ),
		// 'logo_item' => array(
            // 'required' => array(
                // 'rule' => array('notEmpty'),
                // 'message' => 'El logo no puede estar vacio'
            // )
        // ),
    );

	// function logo_noempty($data) {
		// var_dump($data);
		// var_dump($this);
		// debug.die("df");
	// }
	function notEmpty_genero($value) {
		$categorias = $this->Subcategoria->find("all",array(
			'conditions' => array('Subcategoria.categoria_id' => 1)
		));
		foreach ($categorias as $cat) {
			$subcat[] = $cat['Subcategoria']['id'];
		}
		if (in_array($this->data['Item']['subcategoria_id'],$subcat)) {
			if(empty($value['genero_uno'])) {
				return false;
			}
		}

		return true;
	}
}



?>
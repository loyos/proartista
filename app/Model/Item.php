<?php
class Item extends AppModel {
    var $name = 'Item';
	var $actsAs = array('Search.Searchable');

	public $filterArgs = array(
        // 'alias' => array('type' => 'like', 'field' => array('Item.alias', 'Item.genero', 'Item.email', 'Item.ciudad', 'Item.twitter', 'Item.especialidad', 'Item.descripcion', 'Item.actualmente')),
		'alias' => array('type' => 'query', 'method' => 'orConditions'),
		'ciudad' => array('type' => 'like'),
		'subcategoria_id' => array('type' => 'value'),
		'genero' => array('type' => 'like'),
		'status' => array('type' => 'like'),
		'especialidad' => array('type' => 'like'),
		'twitter'=> array('type' => 'like'),
		'descripcion'=> array('type' => 'like'),
		'actualmente'=> array('type' => 'like'),
		'email'=> array('type' => 'like'),
		);

	public function orConditions($data = array()) {
        
		if($data['alias'] != 'Buscar'){
			$campos = explode(" ", $data['alias']);
			// debug($this->filterArgs);
			
			foreach ($campos as $camps){
				foreach ($this->filterArgs as $key => $fargs){
					if($camps != ''){
						$condiciones[] = array(
							$this->alias.'.'. $key . ' LIKE' => '%' . $camps . '%',
						);
					}
				}
			}
			$cond = array(
				'OR' =>	$condiciones				
				);
				// debug($cond);
				// die();
		}else{
			$cond = 1;
		}
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
        'alias' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo es obligatorio'
            )
        ),
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
		'descripcion' => array(
            'required' => array(
                'rule' => array('notEmpty_descripcion'),
                'message' => 'Este campo es obligatorio'
            ),
			'caracteres' => array(
                'rule' => array('caracteres_descripcion'),
                'message' => 'Máximo 60 caracteres'
            ),
        ),
		'biografia' => array(
			'caracteres_bio' => array(
                'rule' => array('caracteres_biografia'),
                'message' => 'Máximo 400 caracteres'
            ),
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
	
	function notEmpty_descripcion($value) {
		if ($value['descripcion'] == '(Define brevemente tu arte y lo que ofreces)' || empty($value['descripcion'])) {
			return false;
		}

		return true;
	}
	
	function caracteres_descripcion($value) {
		if (!empty($value['descripcion'])&& strlen($value['descripcion']) > 60) {
			return false;
		}

		return true;
	}
	
	function caracteres_biografia($value) {
		if (!empty($value['biografia'])&& strlen($value['biografia']) > 210) {
			return false;
		}

		return true;
	}
}



?>
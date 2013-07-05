<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    var $name = 'User';
	
	
	// variables para el buscador
	
	public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        'alias' => array('type' => 'like'),
        'status' => array('type' => 'like')
    );
	
	
	public $hasMany = array(
        'Item' => array(
            'className'  => 'Item',
			'foreignKey'    => 'user_id',
        )
    );
	
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El nombre de usuario no puede estar vacio'
            ),
			'unico' => array(
				'rule' => array('isUnique'),
				'message' => 'Este nombre de usuario ya está en uso'
			)
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El password no puede estar vacio',
				'on' => 'create'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('usuario', 'admin')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),
		'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El nombre no puede estar vacio'
            )
        ),
		'apellido' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El apellido no puede estar vacio'
            )
        ),
		'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El email no puede estar vacio'
            ),
			'email_unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Este email ya está en uso'
			)
        ),
    );
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}

?>
<?php
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session','Auth','Search.Prg');
	public $uses = array('Categoria','Subcategoria','User','Item');
    public $presetVars = true; // using the model configuration
	public $paginate = array();

    public function beforeFilter() {
		parent::beforeFilter();
		
		if($this->Auth->User()){
			$this->Auth->allow('add','cambiar_password','validacion_registro', 'logout'); // Letting users register themselves
		}else{
			$this->Auth->allow('add','login','cambiar_password','validacion_registro', 'logout'); // Letting users register themselves
		}
	}

	public function login() {
		if ($this->request->is('post')) {
			$user = $this->User->find('first',array(
				'conditions' => array('User.activo' => 1, 'User.username' => $this->data['User']['username'])
			));
			if ($this->Auth->login() && (!empty($user))) {
				$role = $this->Auth->user('role');
				$name = $this->Auth->user('nombre');
				if ($role == 'usuario') {
					$this->Session->setFlash(__('Bienvenido'. ' ' . $name), 'success');
					$this->redirect(array(
						'controller' => 'users',
						'action' => 'index'
					));
				} elseif ($role=='admin') {
					$this->Session->setFlash(__('Bienvenido '. $name), 'success');
					$this->redirect(array(
						'controller' => 'users',
						'action' => 'admin_index'
					));
				}
			} else {
				$this->Session->setFlash(__('El nombre de usuario o contraseña son invalidos, vuelve a intentarlo'), 'success');
			}
		} 
	}
	public function logout() {
		$this->Auth->logout();
		$this->redirect(array('controller' => 'index', 'action'=>'index'));
	}
	
	function add() {
		if (!empty($this->data)) {
			$data = $this->data;
			$data['User']['clave_email'] = $this->generaPass();
			if($this->User->save($data, array('validate' => 'first'))){
				$email_register = $this->data['User']['email'];
				$username = $this->data['User']['username'];
				$nombre = $this->data['User']['nombre'];
				$apellido = $this->data['User']['apellido'];
				$clave = $data['User']['clave_email'];
				$Email = new CakeEmail();
				$Email->from(array('me@example.com' => 'Proartista.com'));
				$Email->emailFormat('html');
				$Email->to($email_register);
				$Email->subject('Verifica tu cuenta');
				$Email->template('registro');
				$Email->viewVars(compact('username','apellido','nombre','clave'));
				$Email->send();
				$this->Session->setFlash(__('En breve recibirás un correo para validar tu cuenta'), 'success');
				$this->redirect(array('controller'=>'index', 'action'=>'index'));
			}else {
				$this->Session->setFlash(__('Corrija los errores y vuelva a intentarlo'), 'success');
			}
			// if($this->User->save($this->data, array('validate'=>'first'))){
				// $this->Session->setFlash(__('El registro se realizó con éxito'));
				// $this->redirect(array('controller'=>'index', 'action'=>'index'));
			// }else {
				// $this->Session->setFlash(__('Corrija los errores y vuelva a intentarlo'));
			// }
		}
	}
	
	function index() {
		$user_id = $this->Auth->user('id');
		$items = $this->Item->find('all',array(
			'conditions' => array('Item.user_id' => $user_id)
		));
		
		$this->set(compact('items'));
	}
	
	function admin_index(){  // Así deberían ser todos los buscadores, en la misma vista!
	$this->modelClass = 'Item';
	
			$this->Prg->commonProcess();
			if(!empty($this->passedArgs)){
				$this->paginate['conditions'] = $this->Item->parseCriteria($this->passedArgs);
				$this->paginate['limit'] = 10;
				$this->set('items', $this->paginate());
		}else{
			$this->paginate = array(
				'conditions' => array('1'=> 1),
				'limit' => 10,
				'order' => 'Item.status DESC'
			);
			$this->set('items', $this->paginate());
		}
	}
	
	function admin_user() {
	
	}
	
	function generaPass(){
		$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$longitudCadena=strlen($cadena);
		$pass = "";
		$longitudPass=10;
		for($i=1 ; $i<=$longitudPass ; $i++){
			$pos=rand(0,$longitudCadena-1);
			$pass .= substr($cadena,$pos,1);
		}
		return $pass;
	}
	
	function validacion_registro($clave) {
		$existe = $this->User->find('first',array(
			'conditions' => array('clave_email' => $clave)
		));
		
		if (!empty($existe)) {
			$update = array('User' => array(
				'id' => $existe['User']['id'],
				'clave_email' => '',
				'activo' => 1
			));
			if ($this->User->save($update)) {
				$this->Session->setFlash('Cuenta validada', 'success');
				//$this->redirect(array('controller'=>'users','action'=>'login',$existe));
			}
		} else {
			$this->Session->setFlash('Link de validación inválido', 'success');
		}
		$this->redirect(array('controller'=>'index','action'=>'index'));
	}
	
	function cambiar_password(){
		if (!empty($this->data)) {
			$existe = $this->User->find('first',array(
				'conditions' => array('User.email' => $this->data['User']['email'])
			));
			if (!empty($existe)){
				$clave = $this->generaPass();
				$username = $existe['User']['username'];
				$nombre = $existe['User']['nombre'];
				$apellido = $existe['User']['apellido'];
				$update = array('User'=>array(
					'id' => $existe['User']['id'],
					'password' => $clave
				));
				$this->User->save($update);
				$Email = new CakeEmail();
				$Email->from(array('me@example.com' => 'Proartista.com'));
				$Email->emailFormat('html');
				$Email->to($this->data['User']['email']);
				$Email->subject('Nueva clave');
				$Email->template('cambiar_password');
				$Email->viewVars(compact('username','apellido','nombre','clave'));
				$Email->send();
				$this->Session->setFlash('En breve recibirás un correo para restablecer tu contraseña', 'success');
				$this->redirect(array('controller'=>'index', 'action'=>'index'));
			} else {
				$this->Session->setFlash('No existe un usuario registrado con este email', 'success');
				$this->redirect(array('controller' => 'index', 'action' => 'index'));
			}
		}
	}
	
	function editar($user_id) {
		if (!empty($this->data)) {
			if (empty($this->data['User']['password'])){
				$data = array('User', array(
					'username'=>$this->data['User']['username'],
					'nombre'=>$this->data['User']['nombre'],
					'apellido'=>$this->data['User']['apellido'],
					'email'=>$this->data['User']['email'],
					'telefono'=>$this->data['User']['telefono'],
					'id'=>$this->data['User']['id']
				));
			} else {
				$data = $this->data;
			}
			$this->User->save($data,array('validate'=>'first'));
			$this->Session->setFlash('La actualización se realizó con éxito','success');
			$this->redirect(array('controller'=>'users','action'=>'index'));
		} else {
			$this->data = $this->User->findById($user_id);
		}
	}

}
<?php
App::uses('CakeEmail', 'Network/Email');
class ContactosController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	
	 public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index'); // Letting users register themselves
	}

    public function index() {
		if(!empty($this->data)) {
			$nombre = $this->data['Contacto']['nombre'];
			$apellido = $this->data['Contacto']['apellido'];
			$email = $this->data['Contacto']['email'];
			$mensaje = $this->data['Contacto']['mensaje'];
			$this->Contacto->save($this->data);
			$Email = new CakeEmail();
			$Email->from(array('me@example.com' => 'Proartista.com'));
			$Email->emailFormat('html');
			$Email->to('proartistamr@gmail.com');
			$Email->subject('Te han contactado de proartista');
			$Email->template('contacto');
			$Email->viewVars(compact('nombre','apellido','email','mensaje'));
			$Email->send();
			$this->Session->setFlash('¡Gracias! pronto serás contactado', 'success');
			$this->redirect(array('controller'=>'index','action'=>'index'));
			
		}
		
    }
	
}
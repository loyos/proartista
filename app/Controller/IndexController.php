<?php
class IndexController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	public $uses = array('Item','Noticia','Config','Frase','User');	
	
	 public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','contacto','quienes_somos', 'terminos', 'politicas', 'como_empezar'); // Letting users register themselves
	}

    public function index() {
		$noticias = $this->Noticia->find('all', array(
			'order' => array('Noticia.fecha' => 'desc'))
		);
		$config  = $this->Config->find('first');
		$frases = $this->Frase->find('all');
		$nivel = 1; // nivel de la publicidad, en index por ser el home, la publicidad colocada allí sera de nivel 1!
		// hay que hacer el algoritmo que calcula el nivel de la publicad según el controlador en que estes,
		// esto deberia ser desde appcontroller ya que en todos los controladores hay que calcular el nivel
		// y la publicidad se va a mostrar en todas las vistas!
		$this->set(compact('noticias','nivel','config','frases'));
    }
	
	function contacto(){}
	
	function quienes_somos(){
		$quienes_somos = $this->Config->find('first');
		$this->set(compact('quienes_somos'));
	}
	
	function terminos(){
		$terminos = $this->Config->find('first');
		$this->set(compact('terminos'));
	}
	
	function como_empezar(){
		
	}
	
	function admin_index() {
		if (!empty($this->data)) {
			$data = $this->data;
			$data['Config']['id'] = 1;
			if (!empty($this->data['Frase']['frase'])) {
				// $data_frase = explode('<div',$data['Frase']['frase']);
				// $data['Frase']['frase'] = $data_frase[0];
				$data['Frase']['frase'] =  str_replace("<p>","",$data['Frase']['frase']);
				$data['Frase']['frase'] =  str_replace("</p>","<br>",$data['Frase']['frase']);
				$this->Frase->save($data);
			}
		// $data_qs = explode('<div',$data['Config']['index_quienes_somos']);
		// $data['Config']['index_quienes_somos'] = $data_qs[0];
			$data['Config']['index_quienes_somos'] =  str_replace("<p>","",$data['Config']['index_quienes_somos']);
			$data['Config']['index_quienes_somos'] =  str_replace("</p>","",$data['Config']['index_quienes_somos']);
			$this->Config->save($data);
			$this->Session->setFlash('Se ha actualizado con éxito','success');
		}
		$frases = $this->Frase->find('all');
		$this->set(compact('frases'));
		$this->data = $this->Config->find('first');	
	}
	
	function admin_otros() {
		if (!empty($this->data)) {
			$data = $this->data;
			$data['Config']['id'] = 1;
			$this->Config->save($data);
			$this->Session->setFlash('Se ha actualizado con éxito','success');
		}
		$this->data = $this->Config->find('first');
	}
	
	function politicas(){
		$politicas = $this->Config->find('first');
		$this->set(compact('politicas'));
	}
	
	function admin_eliminar_frase($id) {
		$this->Frase->delete($id);
		$this->redirect(array('action' => 'admin_index'));
	}
	
	function admin_reportes(){
		$publicaciones_activas = $this->Item->find('all',array(
			'conditions' => array('Item.status' => 'activo')
		));
		$publicaciones_activas = count($publicaciones_activas);
		$publicaciones_pendientes = $this->Item->find('all',array(
			'conditions' => array('Item.status' => 'pendiente')
		));
		$publicaciones_pendientes = count($publicaciones_pendientes);
		$totales = $publicaciones_pendientes+$publicaciones_activas;
		$usuarios = $this->User->find('all',array(
			'conditions' => array('User.activo' => 1)
		));
		$usuarios = count($usuarios);
		$this->set(compact('publicaciones_activas','publicaciones_pendientes','totales','usuarios'));
	}

}
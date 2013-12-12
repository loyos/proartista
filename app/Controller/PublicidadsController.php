<?php
class PublicidadsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session','JqImgcrop');

	 public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow('index','descripcion'); // Letting users register themselves
	}

	public function admin_index(){
		$publicidades = $this->Publicidad->find('all');
		$this->set(compact('publicidades'));
	}
	
    public function admin_editar($id=null) {
		if (!empty($this->data['Publicidad']['imagen_publicidad']['name'])) {
				$data = $this->data;
				$data['Publicidad']['imagen'] = $this->data['Publicidad']['imagen_publicidad']['name'];
				$guardo = $this->JqImgcrop->uploadImage($this->data['Publicidad']['imagen_publicidad'], 'img/publicidad', '');
				if ($guardo) {
					$this->Publicidad->save($data);
					$this->Session->setFlash('Se guardó con éxito','success');
					$this->redirect(array('action' => 'admin_index'));
				}
		}
		
		if(!empty($id)) {
			$this->data = $this->Publicidad->findById($id);
			$this->set(compact('id'));
		}
	
    }
	
	function admin_eliminar($id) {
		$this->Publicidad->delete($id);
		$this->Session->setFlash('Se eliminó con éxito','success');
		$this->redirect(array('action' => 'admin_index'));
	}
	
}

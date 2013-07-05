<?php
class NoticiasController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	
	 public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index'); // Letting users register themselves
	}

    public function admin_index() {
		$noticias = $this->Noticia->find('all');
		$this->set(compact('noticias'));
    }
	
	public function admin_editar($id = null) {
		if (!empty($id)) {
			$titulo = 'Edita la noticia';
		} else {
			$titulo = 'Agrega una noticia';
		}
		if (!empty($this->data['Noticia']['noticia'])) {
			$data = $this->data;
			if (!empty($id)) {
				$data['Noticia']['id'] = $id;
			}
			$this->Noticia->save($data);
			if (empty($id)) {
				$this->Session->setFlash('La Noticia se agregó con éxito','success');
			} else {
				$this->Session->setFlash('La Noticia se actualizó con éxito','success');
			}
			$this->redirect(array('action' => 'admin_index'));
		} elseif (!empty($id)) {
			$this->data = $this->Noticia->findById($id);
		}
		
		$this->set(compact('titulo'));
	}
	
	function admin_eliminar($id){
		$this->Noticia->delete($id);
		$this->Session->setFlash('La Noticia se borró con éxito','success');
		$this->redirect(array('action' => 'admin_index'));
	}
	
}
<?php
class NoticiasController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session','JqImgcrop');
	
	 public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index'); // Letting users register themselves
	}

    public function admin_index() {
		$noticias = $this->Noticia->find('all');
		$i = 0;
		foreach ($noticias as $not){
			$noticias[$i]['Noticia']['noticia'] = str_split($not['Noticia']['noticia'], 100);
			$i++;
		}
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
			if (!empty($this->data['Noticia']['Imagen']['name']) && $this->data['Noticia']['Imagen']['error'] != 1 ) {
					$data['Noticia']['imagen'] = $this->data['Noticia']['Imagen']['name'];
					$guardo = $this->JqImgcrop->uploadImage($this->data['Noticia']['Imagen'], 'img', '');
					if ($guardo) {
					} else {
						$this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga", 'success');
						$this->redirect(array('action' => 'admin_editar'));
					}
			} elseif (!empty($this->data['Notica']['Imagen']['name']) && $this->data['Noticia']['Imagen']['error'] == 1 ) {
				$this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga", 'success');
			}
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
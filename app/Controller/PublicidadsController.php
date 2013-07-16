<?php
class PublicidadsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session','JqImgcrop');

	 public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow('index','descripcion'); // Letting users register themselves
	}

    public function admin_index() {
		if (!empty($this->data['Publicidad']['imagen_publicidad']['name'])) {
				$data = $this->data;
				$data['Publicidad']['imagen'] = $this->data['Publicidad']['imagen_publicidad']['name'];
				$guardo = $this->JqImgcrop->uploadImage($this->data['Publicidad']['imagen_publicidad'], 'img/publicidad', '');
				if ($guardo) {
					$this->Publicidad->save($data);
					$this->Session->setFlash('Se guardó con éxito','success');
				}
		}
    }
}

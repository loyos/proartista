<?php
class CategoriasController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session','JqImgcrop');
	public $uses = array('Categoria','Subcategoria','Item', 'Imagen');
	
	function admin_index() {
		$subcategorias = $this->Categoria->find('all',array(
			'contain' => array('Subcategoria')
		));
			//var_dump($subcategorias);debug.die("sdfdf");
		$this->set(compact('subcategorias'));
	}
	
	function admin_eliminar($subcategoria_id) {
		$this->Subcategoria->delete($subcategoria_id);
		$this->redirect(array('action' => 'admin_index'));
	}

	function admin_editar($subcategoria_id=null,$categoria_id=null) {
		if (!empty($categoria_id)) {
			$this->set(compact('categoria_id'));
		}
		if (empty($this->data) && !empty($subcategoria_id)) {
			$this->data = $this->Subcategoria->find('first',array(
				'conditions' => array('Subcategoria.id' => $subcategoria_id)
			));
		} elseif (!empty($this->data)) {
			$this->Subcategoria->save($this->data);
			$this->redirect(array('action'=>'admin_index'));
		}
	}
}
?>
<?php
class ImagenesController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session','JqImgcrop');
	public $uses = array('Categoria','Subcategoria','Item', 'Imagen');
	
	function editar($item_id) {
	
		if(!empty($this->data)){
			$data['Item']['logo_item'] = $this->data['Item']['logo_item'];
			$data['Item']['logo_item']['name'] = $this->data['Item']['logo_item']['name'];
			if (!empty($this->data['Item']['logo_item']['name']) && $this->data['Item']['logo_item']['error'] != 1 ) {	
				$hay_imagen = $this->Imagen->find('all',array(
					'conditions' => array(
						'Imagen.imagen' => $data['Item']['logo_item']['name']
					)
				));
				while (!empty($hay_imagen)) {
					$numero = $this->Imagen->generar_codigo();
					$split = explode('.',$data['Item']['logo_item']['name'],2); 
					$data['Item']['logo_item']['name'] = $split[0].$numero.'.'.$split[1];
					$hay_imagen = $this->Imagen->find('all',array(
						'conditions' => array(
							'Imagen.imagen' => $data['Item']['logo_item']['name']
						)
					));

				}
				$data['Item']['id'] = $item_id;
				$sizes = getimagesize($this->data['Item']['logo_item']['tmp_name']);
				$guardo = $this->JqImgcrop->uploadImage($data['Item']['logo_item'], 'img/logos', '');
				if ($guardo) {
					$data['Item']['logo'] = $data['Item']['logo_item']['name'];
					$this->Item->save($data, array('validate'=>'first'));
				} else {
					$this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga", 'success');
					$this->redirect(array('action' => 'edit'));
				}
			} elseif (!empty($this->data['Item']['logo_item']['name']) && $this->data['Item']['logo_item']['error'] == 1 ) {
				$this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga", 'success');
			}
			
			if(!empty($this->data['Imagen']['galeria_imagen'])){
				foreach($this->data['Imagen']['galeria_imagen'] as $image){		
					
					if (!empty($image['name']) && $image['error'] != 1) {
						//var_dump($this->data['Imagen']['galeria_imagen']);die("dddf");
						// $data = $this->data;
						$data = $image;
						$data['Imagen']['imagen'] = $image['name'];
						$hay_imagen = $this->Imagen->find('all',array(
							'conditions' => array(
								'Imagen.imagen' => $data['Imagen']['imagen']
							)
						));
						while (!empty($hay_imagen)) {
							$numero = $this->Imagen->generar_codigo();
							$split = explode('.',$data['Imagen']['imagen'],2); 
							$data['Imagen']['imagen'] = $split[0].$numero.'.'.$split[1];
							$hay_imagen = $this->Imagen->find('all',array(
								'conditions' => array(
									'Imagen.imagen' => $data['Imagen']['imagen']
								)
							));

						}
						$data['name'] = $data['Imagen']['imagen'];
						$data['Imagen']['item_id'] = $item_id;
						$trae = $this->JqImgcrop->uploadImage($data, 'img/galeria/', '');
						$this->Imagen->create();
						if($this->Imagen->save($data)){
							$this->Session->setFlash("Imágen agregada", 'success');
						} else {
							$this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga", 'success');
							$this->redirect(array('action' => 'edit'));
						}
					} elseif (!empty($image) && $image['error'] == 1 ) {
						$this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga", 'success');
					}
					
					// if (!empty($this->data['Imagen']['galeria_imagen']['name']) && $this->data['Imagen']['galeria_imagen']['error'] != 1) {
						// //var_dump($this->data['Item']['logo_item']);debug.die("dddf");
						// $data = $this->data;
						// $data['Imagen']['imagen'] = $this->data['Imagen']['galeria_imagen']['name'];
						// $this->JqImgcrop->uploadImage($this->data['Imagen']['galeria_imagen'], 'img/galeria/', '');
						// $this->Imagen->save($data);
					// } elseif (!empty($this->data['Imagen']['galeria_imagen']['name']) && $this->data['Imagen']['galeria_imagen']['error'] == 1 ) {
						// $this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga");
					// }
				}
				$this->redirect(array('controller' => 'items', 'action' => 'editar',$item_id, true));
			}
			$this->redirect(array('controller' => 'items', 'action' => 'editar',$item_id, true));
		}else{
			$imagenes = $this->Imagen->find('all',array(
			'conditions' => array('Imagen.item_id' => $item_id)
			));
			$data = $imagenes;
			$item = $this->Item->findById($item_id);
			$data['Item']['logo'] = $item['Item']['logo'];
			$this->data = $data;
			$this->set(compact('imagenes','item_id'));
		}
		
	}
	
	function probando($msj){
		var_dump($msj);
		debug("entrando");
	}
	
	function admin_editar($item_id) {
		if (!empty($this->data['Item']['logo_item']['name']) && $this->data['Item']['logo_item']['error'] != 1 ) {
				$data['Item']['logo'] = $this->data['Item']['logo_item']['name'];
				$data['Item']['id'] = $item_id;
				$sizes = getimagesize($this->data['Item']['logo_item']['tmp_name']);
				$this->JqImgcrop->uploadImage($this->data['Item']['logo_item'], 'img/logos', '');
				$this->Item->save($data, array('validate'=>'first'));
		} elseif (!empty($this->data['Item']['logo_item']['name']) && $this->data['Item']['logo_item']['error'] == 1 ) {
			$this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga");
		}
		
		if(!empty($this->data['Imagen']['galeria_imagen'])){
		foreach($this->data['Imagen']['galeria_imagen'] as $image){			
			if (!empty($image['name']) && $image['error'] != 1) {
				//var_dump($this->data['Item']['logo_item']);debug.die("dddf");
				// $data = $this->data;
				$data = $image;
				$data['Imagen']['id'] = null;
				$data['Imagen']['item_id'] = $item_id;
				$data['Imagen']['imagen'] = $image['name'];
				// debug("aqui me salgo antes de que empiece a subir");
				// die();
				$this->JqImgcrop->uploadImage($image, 'img/galeria/', '');
				if($trae = $this->Imagen->save($data)){
					$this->Session->setFlash("Imágen agregada", 'success');
				}
			} elseif (!empty($image) && $image['error'] == 1 ) {
				$this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga", 'success');
			}
			
			// if (!empty($this->data['Imagen']['galeria_imagen']['name']) && $this->data['Imagen']['galeria_imagen']['error'] != 1) {
				// //var_dump($this->data['Item']['logo_item']);debug.die("dddf");
				// $data = $this->data;
				// $data['Imagen']['imagen'] = $this->data['Imagen']['galeria_imagen']['name'];
				// $this->JqImgcrop->uploadImage($this->data['Imagen']['galeria_imagen'], 'img/galeria/', '');
				// $this->Imagen->save($data);
			// } elseif (!empty($this->data['Imagen']['galeria_imagen']['name']) && $this->data['Imagen']['galeria_imagen']['error'] == 1 ) {
				// $this->Session->setFlash("El tamaño de la imagen sobrepasa el límite de carga");
			// }
		}
		}
		$imagenes = $this->Imagen->find('all',array(
			'conditions' => array('Imagen.item_id' => $item_id)
		));
		$data = $imagenes;
		$item = $this->Item->findById($item_id);
		$data['Item']['logo'] = $item['Item']['logo'];
		$this->data = $data;
		$this->set(compact('imagenes','item_id'));
	}
	
	function eliminar($imagen_id,$item_id){
		$this->Imagen->delete($imagen_id);
		$this->Session->setFlash("La imagen ha sido eliminada", 'success');
		$this->redirect(array('action' => 'editar',$item_id));
	}
	
	function admin_eliminar($imagen_id,$item_id){
		$this->Imagen->delete($imagen_id);
		$this->redirect(array('action' => 'admin_editar',$item_id));
	}
}
?>
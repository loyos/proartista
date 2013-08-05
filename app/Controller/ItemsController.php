<?php
App::uses('CakeEmail', 'Network/Email');
class ItemsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Search.Prg','Session','JqImgcrop','RequestHandler');
	public $presetVars = true;
	public $uses = array('Categoria','Subcategoria','Item', 'Imagen','User','Genero');
	public $paginate = array();


	 public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','descripcion','menu_categoria','find'); // Letting users register themselves
	}

    public function index($subcategoria_id = null, $categoria_id = null) {
		// $this->loadModel('Genero');
		if (!empty($categoria_id) && $categoria_id == 7) {
			$this->redirect(array('controller' => 'contactos', 'action'=>'index'));
		}
		if (!empty($subcategoria_id)) {

			$titulo = $this->Subcategoria->find('first', array(
				'conditions' => array(
					'Subcategoria.id' => $subcategoria_id
				),
				'recursive' => -1
			));
			$this->paginate = array(
				'limit' => 6,
				'conditions' => array(
					'Subcategoria.id' => $subcategoria_id,
					'Item.status' => 'activo'
				),

			);
			$generos = $this->Genero->find('list', array(
				'fields' => array('Genero.nombre',  'Genero.nombre'),
				'recursive' => -1	
				)
			);
			$generos = array_merge(array('Todos'),$generos);
			$this->set('generos', $generos);
			$items = $this->paginate('Item');
			$this->set(compact('items'));


			// debug.sql($this->Subcategoria);
			//var_dump($items);debug.die("dfd");
		}
		$this->set(compact('titulo'));
    }

	public function find($subcategoria_id = null, $categoria_id = null){
		
		$generos = $this->Genero->find('list', array(
				'fields' => array('Genero.nombre',  'Genero.nombre'),
				'recursive' => -1	
				)
			);
			$generos = array_merge(array('Todos'),$generos);
			$this->set('generos', $generos);
		
		$this->modelClass = 'Item';

		$parameter = $this->passedArgs;
		
		$sub_categories = $this->Subcategoria->find('first', array(
				'conditions' => array(
					'Subcategoria.alias' => $parameter
				),
				'recursive' => -1
			));
			
			if(!empty($sub_categories)){
				$this->redirect(array('action' => 'index', $sub_categories['Subcategoria']['id']));
			}
		
		$titulo = $this->Subcategoria->find('first', array(
				'conditions' => array(
					'Subcategoria.id' => $subcategoria_id
				),
				'recursive' => -1
			));
			
		$this->Prg->commonProcess();
		$this->paginate = array(
			'limit' => 6,
			'conditions' => $this->Item->parseCriteria($this->passedArgs)
		);
		$this->set('items', $this->paginate());
		$this->set(compact('titulo'));
	}

	function menu_categoria($id){
		$categorias_menu = $this->Categoria->find('all', array('conditions' => array('id' => $id)));
		$this->set('categorias_menu', $categorias_menu);
		// debug($categorias_menu);
	}

	function descripcion ($item_id){
		$item = $this->Item->find('first',array(
			'conditions' => array('Item.id'=>$item_id),
			'contain' => array('Imagen')
		));
		//var_dump($item);debug.die("dfd");
		$this->set(compact('item'));
	}

	function genero(){ // solo para uso de ajax
		//echo $_POST['name']; // John
		$this->loadModel('Genero');
		$genero = $this->Genero->find('all', array(
			'recursive' => -1,
			'order' => 'Genero.id'
		));
		$this->autoRender = false;
		$this->RequestHandler->respondAs('json');
		echo json_encode($genero);
	}

	function genero1_change(){
		$this->loadModel('Genero');
		$genero = $this->Genero->find('all', array(
			'conditions' => array('nombre !='=>$_POST['genero_uno']),
			'recursive' => -1,
			'order' => 'Genero.id'
		));
		$this->autoRender = false;
		$this->RequestHandler->respondAs('json');
		echo json_encode($genero);
	}

	function genero3_change(){
		$this->loadModel('Genero');
		$genero = $this->Genero->find('all', array(
			'conditions' => array('NOT' => array('Genero.nombre' => array($_POST['genero_uno'],$_POST['genero_tres']))),
			'recursive' => -1,
			'order' => 'Genero.id'
		));
		$this->autoRender = false;
		$this->RequestHandler->respondAs('json');
		echo json_encode($genero);
	}

	function genero2_change(){
		$this->loadModel('Genero');
		$genero = $this->Genero->find('all', array(
			'conditions' => array('NOT' => array('Genero.nombre' => array($_POST['genero_uno'],$_POST['genero_dos']))),
			'recursive' => -1,
			'order' => 'Genero.id'
		));
		$this->autoRender = false;
		$this->RequestHandler->respondAs('json');
		echo json_encode($genero);
	}

	function editar($item_id = null,$listo=false) {
		if ($listo) {
			// $data = $this->Item->findById($item_id);
			// $username = $this->Auth->user('username');
			// $alias = $data['Item']['alias'];
			// $Email = new CakeEmail();
			// $Email->from(array('me@example.com' => 'Proartista.com.ve'));
			// $Email->emailFormat('html');
			// $Email->to($data['Item']['email']);
			// $Email->subject('Tu solicitud está siendo procesada');
			// $Email->template('solicitud_publicacion');
			// $Email->viewVars(compact('username'));
			// $Email->send();
		
		
			// $Email->from(array('me@example.com' => 'Proartista.com.ve'));
			// $Email->emailFormat('html');
			// $Email->to('proartistamr@gmail.com');
			// $Email->subject('Nueva solicitud');
			// $Email->template('nueva_publicacion');
			// $Email->viewVars(compact('username','alias'));
			// $Email->send();
			
			$this->Session->setFlash("Pronto recibirás un email con la aprobación de tu publicación.", 'success');
			$this->redirect(array('controller'=>'users','index'=>'index'));
		}
		if (!empty($this->data)) {
			$data = $this->data;
			$genero = "";
			$categorias_musica = $this->Subcategoria->find("all",array(
				'conditions' => array('Subcategoria.categoria_id' => 1)
			));
			foreach ($categorias_musica as $cat) {
				$subcat_musica[] = $cat['Subcategoria']['id'];
			}
			if (in_array($this->data['Item']['subcategoria_id'],$subcat_musica)) {
				if (!empty($data['Item']['genero_uno'])) {
					$genero = $data['Item']['genero_uno'];
				}
				if (!empty($data['Item']['genero_dos'])) {
					if ($genero != "") {
						$genero = $genero.'/'.$data['Item']['genero_dos'];
					} else {
						$genero = $data['Item']['genero_dos'];
					}
				}
				if (!empty($data['Item']['genero_tres'])) {
					if ($genero != "") {
						$genero = $genero.'/'.$data['Item']['genero_tres'];
					} else {
						$genero = $genero.'/'.$data['Item']['genero_tres'];
					}
				}
			}
			$data['Item']['genero']  = $genero;
			if (empty($data['Item']['user_id'])) {
				$data['Item']['user_id'] = $this->Auth->user('id');
			}
			if (!empty($this->data['Item']['logo_item']['name'])) {
				$data['Item']['logo'] = $this->data['Item']['logo_item']['name'];
				//var_dump($this->data['Item']['logo_item']);
				$sizes = getimagesize($this->data['Item']['logo_item']['tmp_name']);
				$this->JqImgcrop->uploadImage($this->data['Item']['logo_item'], 'img/logos', '');
			}
			$data['Item']['activo'] = 0;
			$saved = $this->Item->save($data, array('validate'=>'first'));
			if ($saved) {
				$item_id = $this->Item->id;
				$this->redirect(array('controller'=>'imagenes','action'=>'editar',$item_id));
			}
		}
		$gen_uno = null;
		$gen_dos = null;
		$gen_tres = null;
		if (!empty($item_id)) {
			$this->data = $this->Item->find('first',array(
				'conditions' => array('Item.id' => $item_id),
				'contain' => array('Imagen')
			));
			$title = 'Edita tu publicación';
			$origen = 'edit';
			$generos = explode('/',$this->data['Item']['genero']);
			if (isset($generos[0])) {
				$gen_uno = $generos[0];
			} else {
				$gen_uno = '';
			}
			if (isset($generos[1])) {
				$gen_dos = $generos[1];
			}  else {
				$gen_dos = '';
			}
			if (isset($generos[2])) {
				$gen_tres = $generos[2];
			}  else {
				$gen_tres = '';
			}
			// var_dump($generos);
			// debug.die($generos);
		} else {
			$origen = 'agregar';
			$title = 'Agrega una publicación';
		}

		$this->set(compact('gen_uno','gen_dos','gen_tres'));
		$user_id = $this->Auth->user('id');
		$datos_usuario = $this->User->findById($user_id);
		$this->set(compact('datos_usuario'));
		$categorias = $this->Categoria->find('all');
		$generos = $this->Genero->find('list',array(
			'fields'=>array('id','nombre'),
			'order' => 'Genero.id'
		));
		$generos = array('0'=>'')+$generos;
		$musica = $this->Subcategoria->find('all',array('conditions'=>array('categoria_id'=>1)));
		foreach ($musica as $m) {
			$subcat_musica[] = $m['Subcategoria']['id'];
		}
		foreach ($categorias as $categoria) {
			foreach ($categoria['Subcategoria'] as $sc) {
			$subcategorias[$categoria['Categoria']['alias']][$sc['id']] = $sc['alias'];
			}
		}
		$this->set(compact('title','items','subcategorias','origen','generos','subcat_musica'));
	}

	function admin_editar($item_id = null, $accion = null) {
		if (!empty($accion) && $accion == 'activar') {
			$update = array('Item' => array(
				'id' => $item_id,
				'status' => 'activo'
			));
			$this->Item->save($update);
			$username = $this->Auth->user('username');
			$item = $this->Item->findById($item_id);
			$Email = new CakeEmail();
			$Email->from(array('me@example.com' => 'Proartista.com.ve'));
			$Email->emailFormat('html');
			$Email->to($item['Item']['email']);
			$Email->subject('Tu publicación ha sido aprobada');
			$Email->template('activar');
			$Email->viewVars(compact('username','item_id'));
			$Email->send();
			$this->redirect(array('controller'=>'users','action'=>'admin_index'));
		}
		if (!empty($this->data)) {
			$data = $this->data;
			$genero = "";
			if (!empty($data['Item']['genero_uno'])) {
				$genero = $data['Item']['genero_uno'];
			}
			if (!empty($data['Item']['genero_dos'])) {
				if ($genero != "") {
					$genero = $genero.'/'.$data['Item']['genero_dos'];
				} else {
					$genero = $data['Item']['genero_dos'];
				}
			}
			if (!empty($data['Item']['genero_tres'])) {
				if ($genero != "") {
					$genero = $genero.'/'.$data['Item']['genero_tres'];
				} else {
					$genero = $genero.'/'.$data['Item']['genero_tres'];
				}
			}
			$data['Item']['genero']  = $genero;
			if (!empty($this->data['Item']['logo_item']['name'])) {
				$data['Item']['logo'] = $this->data['Item']['logo_item']['name'];
				$this->JqImgcrop->uploadImage($this->data['Item']['logo_item'], 'img/logos/', '');
			}
			$this->Item->save($data, array('validate'=>'first'));
			$item_id = $this->Item->id;
			$this->redirect(array('controller'=>'imagenes','action'=>'admin_editar',$item_id));
		}
		$gen_uno = '';
		$gen_dos = '';
		$gen_tres = '';
		if (!empty($item_id)) {
			$this->data = $this->Item->find('first',array(
				'conditions' => array('Item.id' => $item_id),
				'contain' => array('Imagen')
			));
			$title = 'Edita tu publicación';
			$origen = 'edit';
			$generos = explode('/',$this->data['Item']['genero']);
			if (isset($generos[0])) {
				$gen_uno = $generos[0];
			} else {
				$gen_uno = '';
			}
			if (isset($generos[1])) {
				$gen_dos = $generos[1];
			}  else {
				$gen_dos = '';
			}
			if (isset($generos[2])) {
				$gen_tres = $generos[2];
			}  else {
				$gen_tres = '';
			}

		} else {
			$origen = 'agregar';
			$title = 'Agrega una publicación';
		}
		$this->set(compact('gen_uno','gen_dos','gen_tres'));
		$categorias = $this->Categoria->find('all');
		$generos = $this->Genero->find('list',array(
			'fields'=>array('id','nombre'),
			'order' => 'Genero.id'
		));
		$generos = array('0'=>'')+$generos;
		$musica = $this->Subcategoria->find('all',array('conditions'=>array('categoria_id'=>1)));
		foreach ($musica as $m) {
			$subcat_musica[] = $m['Subcategoria']['id'];
		}
		foreach ($categorias as $categoria) {
			foreach ($categoria['Subcategoria'] as $sc) {
			$subcategorias[$categoria['Categoria']['alias']][$sc['id']] = $sc['alias'];
			}
		}
		$this->set(compact('title','items','subcategorias','origen','generos','subcat_musica'));
	}

	function eliminar($item_id) {
		$this->Item->delete($item_id);
		$this->redirect(array('controller'=>'users','action'=>'index'));
	}

	function admin_eliminar($item_id) {
		$this->Item->delete($item_id);
		$this->redirect(array('controller'=>'users','action'=>'admin_index'));
	}

	function admin_pendiente($item_id) {
		$item = $this->Item->findById($item_id);
		$username = $this->Auth->user('username');
		if (!empty($this->data)) {
			$mensaje = $this->data['Item']['mensaje'];
			$Email = new CakeEmail();
			$Email->from(array('me@example.com' => 'Proartista.com.ve'));
			$Email->emailFormat('html');
			$Email->to($item['Item']['email']);
			$Email->subject('Tu publicación no ha sido aprobada');
			$Email->template('pendiente');
			$Email->viewVars(compact('mensaje','username'));
			$Email->send();
			$this->Session->setFlash("Se ha enviado un correo al usuario",'success');
			$this->redirect(array('controller'=>'users','action'=>'admin_index'));
		}
	}
}

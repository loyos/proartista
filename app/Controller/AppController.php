<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {

	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'index', 'action' => 'index'),
			'authorize' => array('Controller'),
        )
		
    );
	function beforeFilter() {
		//var_dump($this->Auth->logoutRedirect); debug.die("dfdf");
		$user_id = $this->Auth->user('id');
		$role = $this->Auth->user('role');
		$username = $this->Auth->user('username');
		Security::setHash('md5');
		$this->Auth->allow('*');
		@Controller::loadModel('Categoria'); 
		@Controller::loadModel('Subcategoria');
		@Controller::loadModel('Publicidad');
			  //     var $uses = array('Categoria','Subcategoria');
		
		$categorias = $this->Categoria->find('all', array(
			'order' => 'orden'
		));
		
		$publicidad = $this->Publicidad->find('all');
		$this->set('publicidad', $publicidad);
		
		foreach ($categorias as $cat) {
			$subcat[] = $cat['Subcategoria'];
		}
		$this->set('categorias', $categorias);
		$this->set('subcat', $subcat);
		$this->set('user_id', $user_id);
		$this->set('username', $username);
		$this->set('role', $role);
	}
	
	public function isAuthorized($user=null) {
    // Admin can access every action
		//debug("entro");
		//var_dump(strpos($this->action,'admin'));debug.die("sd");
		if (strpos($this->action,'admin') === false) {
				return true;
		} else {
			if (isset($user['role']) && $user['role'] === 'admin') {
				return true;
			} else {
				return false;
			}
		}
		// Default deny
		return true;
	}
}


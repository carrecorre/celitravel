<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller','CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller'=>'pages',
                'action' => 'home'
            ),
            'logoutRedirect' => array(
                'controller'=>'pages',
                'action' => 'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller'),
            'authError' => false
        )
    );


    public function beforeFilter(){
        $this->Auth->allow('logout','home'); //acceso para no logueados
        $this->Session->write('current_user',  $this->Auth->user());
        $this->set('current_user', $this->Auth->user());
    }

    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] == 'admin'){
            return true;
        }
        return false;
    }
    
    public function paginar($param_consulta, $condiciones, $limit, $modelo = null) {
        $this->Paginator = $this->Components->load(
            'Paginator',
            Hash::merge(
                $param_consulta,
                array(
                    'limit' => $limit,
                )
            )
        );
        if(isset($modelo)){
            return $this->Paginator->paginate($modelo, $condiciones);
        }else{
            return $this->Paginator->paginate($condiciones);
        }
    }

}

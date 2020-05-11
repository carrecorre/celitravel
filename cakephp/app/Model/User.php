<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Review $Review
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $actsAs = array(
		'Upload.Upload' => array(
			'foto' => array(
				'fields' => array(
					'dir' => 'foto_dir'
				),
				'thumbnailMethod' => 'php',
				'deleteOnUpdate' => true,
				'deleteFolderOnDelete' => true
			)
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'surname' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foto' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Error al subir la imagen',
				'on' => 'create'
			),
			'isUnderPhpSizeLimit' => array(
				'rule' => 'isUnderPhpSizeLimit',
				'message' => 'La imagen excede el límite de tamaño',
			),
			'isValidMimeType' => array(
				'rule' => array('isValidMimeType', array('image/jpeg', 'image/png'), false),
				'message' => 'La imagen no es formato jpg o png',
			),
			'isBelowMaxSize' => array(
				'rule' => array('isBelowMaxSize', 10485760),
				'message' => 'El tamaño de la imagen es demasiado grande',
			),
			'isValidExtension' => array(
				'rule' => array('isValidExtension', array('jpg', 'png'), false),
				'message' => 'La imagen no es formato jpg o png',
			),
			'checkUniqueName' => array(
				'rule' => array('checkUniqueName'),
				'message' => 'La imagen con ese nombre ya se encuentra registrada',
				'on' => 'update'
			),
		),
		'password' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Review' => array(
			'className' => 'Review',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function checkUniqueName($data){

		$isUnique = $this->find('first',
								array(
									'fields' => array('User.foto'),
									'conditions' =>	array('User.foto' => $data['foto'])
									)
								);
		if(!empty($isUnique)){
			return false;
		}else{
			return true;
		}	
	}

	

	public function beforeSave($options = array()){

		if(isset($this->data[$this->alias]['password'])){

			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}


}

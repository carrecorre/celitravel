<?php
App::uses('AppModel', 'Model');
/**
 * Restaurant Model
 *
 * @property Province $Province
 * @property Review $Review
 */
class Restaurant extends AppModel {

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
		'address' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'postal_code' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'postal' => array(
				'rule' => array('postal'),
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
		'phone' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
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
		'web' => array(
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'town' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Province' => array(
			'className' => 'Province',
			'foreignKey' => 'province_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Review' => array(
			'className' => 'Review',
			'foreignKey' => 'restaurant_id',
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

	function checkUniqueName($data){

		$isUnique = $this->find('first',
								array(
									'fields' => array('Restaurant.foto'),
									'conditions' =>	array('Restaurant.foto' => $data['foto'])
									)
								);
		if(!empty($isUnique)){
			return false;
		}else{
			return true;
		}	
	}

	public function restaurantUserDistance($restLat, $restLong, $userLocation){

		if($userLocation != null){
			
		$userLat = $userLocation['lat'];
		$userLong = $userLocation['lon'];

		$theta = $restLong - $userLong;
		$dist = sin(deg2rad($restLat)) * sin(deg2rad($userLat)) +  cos(deg2rad($restLat)) * cos(deg2rad($userLat)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$distance = $dist * 60 * 1.1515;
		
			return $distance;

		}else{
			return false;

		}
	}

	public function findBestGeneralRated($number){
		return $this->find (
            'all',
            array(
                'joins' => array (
                    array(
                        'alias' => 'Review',
                        'table' => 'reviews',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Review.restaurant_id = Restaurant.id',
                        ),
                    ),
                    
                ),
                'group' => array(
                    'Review.restaurant_id',
                ),
                'order' => array(
                    'AVG(Review.general_rate) ' => 'desc',
				),
				'limit' => $number
				
            )
        );

	}

	public function findBestGlutenKnowledgeRated($number){
		return $this->find (
            'all',
            array(
                'joins' => array (
                    array(
                        'alias' => 'Review',
                        'table' => 'reviews',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Review.restaurant_id = Restaurant.id',
                        ),
					),
	
                ),
                'group' => array(
                    'Review.restaurant_id',
                ),
                'order' => array(
                    'AVG(Review.gluten_knowledge) ' => 'desc',
				),
				'limit' => $number
            )
        );

	}

	public function findBestGlutenAdaptationRated($number){
		return $this->find (
            'all',
            array(
                'joins' => array (
                    array(
                        'alias' => 'Review',
                        'table' => 'reviews',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Review.restaurant_id = Restaurant.id',
                        ),
					),
	
                ),
                'group' => array(
                    'Review.restaurant_id',
                ),
                'order' => array(
                    'AVG(Review.gluten_adaptation) ' => 'desc',
				),
				'limit' => $number
				
            )
        );

	}

	public function search($conditions, $specialties){
		return $this->find (
			'all',
			
			array(
				'fields' => array('DISTINCT Restaurant.*',
								  'Province.*'
								),
                'conditions' => $conditions,
				'limit' => 100,		
				'joins' => array (
                    array(
                        'alias' => 'RestaurantSpecialty',
                        'table' => 'restaurants_specialties',
						'type' => 'INNER',
						'fields' => array('RestaurantSpecialty.restaurant_id'),
                        'conditions' => array(
							'RestaurantSpecialty.restaurant_id = Restaurant.id',
							'RestaurantSpecialty.specialty_id' => $specialties
                        ),
					),
	
                ),
			)
			
        );
	}
}

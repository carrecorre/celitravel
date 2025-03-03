<?php
App::uses('AppModel', 'Model');
/**
 * RestaurantsSpecialty Model
 *
 * @property Restaurant $Restaurant
 * @property Specialty $Specialty
 */
class RestaurantSpecialty extends AppModel {

	
    public $useTable = 'restaurants_specialties';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Restaurant' => array(
			'className' => 'Restaurant',
			'foreignKey' => 'restaurant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Specialty' => array(
			'className' => 'Specialty',
			'foreignKey' => 'specialty_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function addWithSpecialtyIdAndRestaurantId($specialty_id, $restaurant_id) {

			$this->create();
			$restaurantSpecialty['specialty_id'] = $specialty_id;
			$restaurantSpecialty['restaurant_id'] = $restaurant_id;
			$this->save($restaurantSpecialty);
		
	}

	public function deleteRestaurantsSpecialtyByRestaurantId($restaurant_id){

		$restaurantSpecialties = $this->findAllByRestaurantId($restaurant_id);
		
		foreach($restaurantSpecialties as $restaurantSpecialty){
			$this->delete($restaurantSpecialty['RestaurantSpecialty']['id']);
		}

	}

	public function getSpecialtiesIdsByRestaurantId($id = null){

        $restaurantSpecialties = $this->findAllByRestaurantId($id);

        $specialties = array();
        foreach($restaurantSpecialties as $key => $restaurantSpecialty){
            $specialties[$key] = $restaurantSpecialty['Specialty']['id'];
        }
        return $specialties;
    }

    public function getSpecialtiesNamesByRestaurantId($id = null){

        $restaurantSpecialties = $this->findAllByRestaurantId($id);

        $specialties = array();
        foreach($restaurantSpecialties as $restaurantSpecialty){
            $specialties[$restaurantSpecialty['Specialty']['id']] = $restaurantSpecialty['Specialty']['name'];
        }
        return $specialties;
    }
}

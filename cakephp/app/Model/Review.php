<?php
App::uses('AppModel', 'Model');
/**
 * Review Model
 *
 * @property Restaurant $Restaurant
 * @property User $User
 */
class Review extends AppModel {


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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	
    
    public function getAveragesByRestaurantId($id = null){

        $generalRate = $this->getGeneralRateByRestaurantId($id);
        $knowledgeRate = $this->getGlutenKnowledgeByRestaurantId($id);
        $adaptationRate = $this->getGlutenAdaptationByRestaurantId($id);

        $averages['general'] = $generalRate[0]['average'];
        $averages['knowledge'] = $knowledgeRate[0]['average'];
        $averages['adaptation'] = $adaptationRate[0]['average'];
        
        return $averages;
    }

    public function getGeneralRateByRestaurantId($id = null){

        return $this->find(
            'first',
            array(
                'fields' => array(
                    'AVG(Review.general_rate) as average'
                ),
                'conditions' => array(
                    'Review.restaurant_id' => $id
                )
            )
        );
    }

    public function getGlutenKnowledgeByRestaurantId($id = null){

        return $this->find(
            'first',
            array(
                'fields' => array(
                    'AVG(Review.gluten_knowledge) as average'
                ),
                'conditions' => array(
                    'Review.restaurant_id' => $id
                )
            )
        );
    }

    public function getGlutenAdaptationByRestaurantId($id = null){

        return $this->find(
            'first',
            array(
                'fields' => array(
                    'AVG(Review.gluten_adaptation) as average'
                ),
                'conditions' => array(
                    'Review.restaurant_id' => $id
                )
            )
        );
    }
}

<?php
App::uses('AppModel', 'Model');
/**
 * Specialty Model
 *
 * @property Restaurant $Restaurant
 */
class Specialty extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Restaurant' => array(
			'className' => 'Restaurant',
			'joinTable' => 'restaurants_specialties',
			'foreignKey' => 'specialty_id',
			'associationForeignKey' => 'restaurant_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}

<?php
App::uses('RestaurantsSpecialtiesController', 'Controller');

/**
 * RestaurantsSpecialtiesController Test Case
 */
class RestaurantsSpecialtiesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.restaurants_specialty',
		'app.restaurant',
		'app.province',
		'app.review',
		'app.user',
		'app.specialty'
	);

}

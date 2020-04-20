<?php
App::uses('RestaurantsSpecialty', 'Model');

/**
 * RestaurantsSpecialty Test Case
 */
class RestaurantsSpecialtyTest extends CakeTestCase {

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
		'app.specialty'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RestaurantsSpecialty = ClassRegistry::init('RestaurantsSpecialty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RestaurantsSpecialty);

		parent::tearDown();
	}

}

<?php
App::uses('SpecialtiesController', 'Controller');

/**
 * SpecialtiesController Test Case
 */
class SpecialtiesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.specialty',
		'app.restaurant',
		'app.province',
		'app.review',
		'app.user',
		'app.restaurants_specialty'
	);

}

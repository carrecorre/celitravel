<?php
/**
 * Restaurant Fixture
 */
class RestaurantFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'postal_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'web' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'province_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'town' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'monday_open' => array('type' => 'time', 'null' => true, 'default' => null),
		'monday_close' => array('type' => 'time', 'null' => true, 'default' => null),
		'tuesday_open' => array('type' => 'time', 'null' => true, 'default' => null),
		'tuesday_close' => array('type' => 'time', 'null' => true, 'default' => null),
		'wednesday_open' => array('type' => 'time', 'null' => true, 'default' => null),
		'wednesday_close' => array('type' => 'time', 'null' => true, 'default' => null),
		'thursday_open' => array('type' => 'time', 'null' => true, 'default' => null),
		'thursday_close' => array('type' => 'time', 'null' => true, 'default' => null),
		'friday_open' => array('type' => 'time', 'null' => true, 'default' => null),
		'friday_close' => array('type' => 'time', 'null' => true, 'default' => null),
		'saturday_open' => array('type' => 'time', 'null' => true, 'default' => null),
		'saturday_close' => array('type' => 'time', 'null' => true, 'default' => null),
		'sunday_open' => array('type' => 'time', 'null' => true, 'default' => null),
		'sunday_close' => array('type' => 'time', 'null' => true, 'default' => null),
		'latitude' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '30,20', 'unsigned' => false),
		'longitude' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '30,20', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'email' => array('column' => 'email', 'unique' => 1),
			'FK_restaurants_province_id' => array('column' => 'province_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'postal_code' => 'Lorem ip',
			'phone' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'web' => 'Lorem ipsum dolor sit amet',
			'province_id' => 1,
			'town' => 'Lorem ipsum dolor sit amet',
			'monday_open' => '12:08:10',
			'monday_close' => '12:08:10',
			'tuesday_open' => '12:08:10',
			'tuesday_close' => '12:08:10',
			'wednesday_open' => '12:08:10',
			'wednesday_close' => '12:08:10',
			'thursday_open' => '12:08:10',
			'thursday_close' => '12:08:10',
			'friday_open' => '12:08:10',
			'friday_close' => '12:08:10',
			'saturday_open' => '12:08:10',
			'saturday_close' => '12:08:10',
			'sunday_open' => '12:08:10',
			'sunday_close' => '12:08:10',
			'latitude' => '',
			'longitude' => ''
		),
	);

}

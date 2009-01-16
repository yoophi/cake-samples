<?php
/* SVN FILE: $Id: category_fixture.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* Category Fixture generated on: 2008-12-29 15:12:30 : 1230530970*/

class CategoryFixture extends CakeTestFixture {
	var $name = 'Category';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'board_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'name' => array('type'=>'string', 'null' => false, 'length' => 60),
			'post_count' => array('type'=>'integer', 'null' => false, 'default' => '0'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'board_id'  => 1,
			'name'  => 'Category 1',
			'post_count'  => 0
			));
}
?>
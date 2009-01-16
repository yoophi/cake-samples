<?php 
/* SVN FILE: $Id: tag_fixture.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* Tag Fixture generated on: 2008-12-29 15:12:32 : 1230530972*/

class TagFixture extends CakeTestFixture {
	var $name = 'Tag';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => false, 'length' => 128),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2008-12-29 15:09:32'
			));
}
?>
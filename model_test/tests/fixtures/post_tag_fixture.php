<?php 
/* SVN FILE: $Id: post_tag_fixture.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* PostTag Fixture generated on: 2008-12-29 15:12:31 : 1230530971*/

class PostTagFixture extends CakeTestFixture {
	var $name = 'PostTag';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'post_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'tag_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'post_id'  => 1,
			'tag_id'  => 1
			));
}
?>
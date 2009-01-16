<?php 
/* SVN FILE: $Id: user_fixture.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* User Fixture generated on: 2008-12-29 15:12:33 : 1230530973*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'username' => array('type'=>'string', 'null' => false, 'length' => 128),
			'passwd' => array('type'=>'string', 'null' => false, 'length' => 64),
			'name' => array('type'=>'string', 'null' => false, 'length' => 50),
			'phone' => array('type'=>'string', 'null' => false, 'length' => 16),
			'active' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'from' => array('type'=>'string', 'null' => false, 'length' => 32),
			'last_visit' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'level' => array('type'=>'integer', 'null' => false, 'default' => '9', 'length' => 10),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'passwd'  => 'Lorem ipsum dolor sit amet',
			'name'  => 'Lorem ipsum dolor sit amet',
			'phone'  => 'Lorem ipsum do',
			'active'  => 1,
			'from'  => 'Lorem ipsum dolor sit amet',
			'last_visit'  => '2008-12-29 15:09:33',
			'modified'  => '2008-12-29 15:09:33',
			'level'  => 1,
			'created'  => '2008-12-29 15:09:33'
			));
}
?>
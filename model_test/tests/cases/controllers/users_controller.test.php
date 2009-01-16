<?php 
/* SVN FILE: $Id: users_controller.test.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* UsersController Test cases generated on: 2008-12-29 14:12:47 : 1230529667*/
App::import('Controller', 'Users');

class TestUsers extends UsersController {
	var $autoRender = false;
}

class UsersControllerTest extends CakeTestCase {
	var $Users = null;

	function setUp() {
		$this->Users = new TestUsers();
		$this->Users->constructClasses();
	}

	function testUsersControllerInstance() {
		$this->assertTrue(is_a($this->Users, 'UsersController'));
	}

	function tearDown() {
		unset($this->Users);
	}
}
?>
<?php 
/* SVN FILE: $Id: comments_controller.test.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* CommentsController Test cases generated on: 2008-12-29 14:12:42 : 1230529662*/
App::import('Controller', 'Comments');

class TestComments extends CommentsController {
	var $autoRender = false;
}

class CommentsControllerTest extends CakeTestCase {
	var $Comments = null;

	function setUp() {
		$this->Comments = new TestComments();
		$this->Comments->constructClasses();
	}

	function testCommentsControllerInstance() {
		$this->assertTrue(is_a($this->Comments, 'CommentsController'));
	}

	function tearDown() {
		unset($this->Comments);
	}
}
?>
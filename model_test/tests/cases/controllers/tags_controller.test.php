<?php 
/* SVN FILE: $Id: tags_controller.test.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* TagsController Test cases generated on: 2008-12-29 14:12:45 : 1230529665*/
App::import('Controller', 'Tags');

class TestTags extends TagsController {
	var $autoRender = false;
}

class TagsControllerTest extends CakeTestCase {
	var $Tags = null;

	function setUp() {
		$this->Tags = new TestTags();
		$this->Tags->constructClasses();
	}

	function testTagsControllerInstance() {
		$this->assertTrue(is_a($this->Tags, 'TagsController'));
	}

	function tearDown() {
		unset($this->Tags);
	}
}
?>
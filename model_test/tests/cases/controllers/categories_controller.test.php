<?php 
/* SVN FILE: $Id: categories_controller.test.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* CategoriesController Test cases generated on: 2008-12-29 14:12:40 : 1230529660*/
App::import('Controller', 'Categories');

class TestCategories extends CategoriesController {
	var $autoRender = false;
}

class CategoriesControllerTest extends CakeTestCase {
	var $Categories = null;

	function setUp() {
		$this->Categories = new TestCategories();
		$this->Categories->constructClasses();
	}

	function testCategoriesControllerInstance() {
		$this->assertTrue(is_a($this->Categories, 'CategoriesController'));
	}

	function tearDown() {
		unset($this->Categories);
	}
}
?>
<?php 
/* SVN FILE: $Id$ */
/* PostsController Test cases generated on: 2009-01-20 14:01:47 : 1232428487*/
App::import('Controller', 'Posts');

class TestPosts extends PostsController {
	var $autoRender = false;
}

class PostsControllerTest extends CakeTestCase {
	var $Posts = null;

	function setUp() {
		$this->Posts = new TestPosts();
		$this->Posts->constructClasses();
	}

	function testPostsControllerInstance() {
		$this->assertTrue(is_a($this->Posts, 'PostsController'));
	}

	function tearDown() {
		unset($this->Posts);
	}
}
?>
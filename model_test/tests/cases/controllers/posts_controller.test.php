<?php
/* SVN FILE: $Id: posts_controller.test.php,v 1.2 2008/12/31 06:13:16 yoophi Exp $ */
/* PostsController Test cases generated on: 2008-12-29 14:12:44 : 1230529664*/
App::import('Controller', 'Posts');

class TestPosts extends PostsController {
	var $autoRender = false;
}

class PostsControllerTest extends CakeTestCase {
	var $Posts = null;
	var $fixtures = array('app.board');

	function setUp() {
		$this->Posts = new TestPosts();
		$this->Posts->constructClasses();
	}

	function testPostsControllerInstance() {
		$this->assertTrue(is_a($this->Posts, 'PostsController'));
	}

	function testPostsIndex() {
		$this->testAction('/posts', array('fixturize'=>true));
	}
	function tearDown() {
		unset($this->Posts);
	}
}
?>
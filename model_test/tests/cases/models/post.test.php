<?php 
/* SVN FILE: $Id$ */
/* Post Test cases generated on: 2009-01-20 14:01:31 : 1232428471*/
App::import('Model', 'Post');

class PostTestCase extends CakeTestCase {
	var $Post = null;
	var $fixtures = array('app.post');

	function startTest() {
		$this->Post =& ClassRegistry::init('Post');
	}

	function testPostInstance() {
		$this->assertTrue(is_a($this->Post, 'Post'));
	}

	function testPostFind() {
		$this->Post->recursive = -1;
		$results = $this->Post->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Post' => array(
			'id'  => 1,
			'title'  => 'test post',
			'body'  => 'Hello, world.',
			'created'  => '2008-01-01 01:00:00',
			'modified'  => '2008-12-31 23:59:59'
			));
		$this->assertEqual($results, $expected);
	}
}
?>
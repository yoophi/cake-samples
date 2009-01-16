<?php
/* SVN FILE: $Id: boards_controller.test.php,v 1.2 2008/12/31 06:13:16 yoophi Exp $ */
/* BoardsController Test cases generated on: 2008-12-29 14:12:39 : 1230529659*/
App::import('Controller', 'Boards');

class TestBoards extends BoardsController {
	var $autoRender = false;
}

class BoardsControllerTest extends CakeTestCase {
	var $Boards = null;
	var $fixtures = array('app.board', 'app.category', 'app.post', 'app.user', 'app.comment', 'app.tag', 'app.post_tag');
	var $fixturizedModels = array('Board', 'Category', 'Post', 'User', 'Comment', 'Tag', 'PostTag');
	var $_started = false;

	function testBoardsIndex() {
		$result = $this->testAction('/boards', array('return'=>'vars'));
		debug($result);
	}

	function testBoardView() {
		$result = $this->testAction('/boards/view/1', array('return'=>'view'));
		debug($result);
	}

	function testBoardAdd() {
		$result = $this->testAction('/boards/foo', array('data'=>array(
			'Board'=>array('id'=>10, 'title'=>'kkk'))));
		debug($result);

		debug($this->testAction('/boards/view/10', array('return'=>'view')));
	}
	function testBoardsIndex2() {
		$result = $this->testAction('/boards', array('return'=>'vars'));
		debug($result);
	}


	function startController() {
		foreach($this->fixturizedModels as $name) {
			if (class_exists($name) || App::import('Model', $name)) {
				$object =& ClassRegistry::init($name);
				$object->setDataSource('test_suite');
			}

		}
	}
	function endController() {
	}

}
?>
<?php
/* SVN FILE: $Id: category.test.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* Category Test cases generated on: 2008-12-29 15:12:30 : 1230530970*/
App::import('Model', 'Category');

class CategoryTestCase extends CakeTestCase {
	var $Category = null;
	var $fixtures = array('app.category', 'app.board', 'app.post', 'app.user', 'app.comment', 'app.tag', 'app.post_tag');

	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function testCategoryInstance() {
		$this->assertTrue(is_a($this->Category, 'Category'));
	}

	function testCategoryValidateIsUnique() {
		$data1 = array('Category' => array('name'=>'Category 1', 'board_id'=>1));
		$data2 = array('Category' => array('name'=>'Category 2', 'board_id'=>1));
		$this->assertFalse($this->Category->create($data1) && $this->Category->validates());
		$this->assertTrue($this->Category->create($data2) && $this->Category->validates());
	}

	function testCategoryValidateIsValidBoardId() {
		$this->assertFalse($this->Category->isValidBoardId(array('board_id' => 10)));
		$this->assertTrue($this->Category->isValidBoardId(array('board_id' => 1)));

		$data = array('Board' => array(
			'name'  => 'some_name',
			'title'  => 'Lorem ipsum dolor sit amet',
			'use_attachment'  => 0,
			'use_category'  => 0,
			'theme'  => 'some theme',
			'post_per_page'  => 10,
			'perm_index'  => 1,
			'perm_read'  => 1,
			'perm_write'  => 1,
			'perm_delete'  => 1,
			'perm_notice'  => 1,
			'perm_comment'  => 1,
			'raw_converter'  => 'markdown',
			'use_captcha'  => 1,
			'use_notice'  => 1,
			'use_secret_comment'  => 1,
			'use_secret_post'  => 1,
			));
		$this->assertTrue($this->Category->Board->add($data));
		$board_id = $this->Category->Board->getLastInsertId();
		$this->assertTrue($this->Category->isValidBoardId(array('board_id' => $board_id)));
		$this->assertFalse($this->Category->isValidBoardId(array('board_id' => $board_id+1)));
	}

	function testCategoryAdd() {
		$this->assertTrue($this->Category->add('category', 1));
		$this->assertFalse($this->Category->add('category', 1));
		$this->assertFalse($this->Category->add('category', 10));
	}

	function testCategoryGetCategories() {
		$expected = array(1 => 'Category 1');
		$this->assertEqual($this->Category->getBoardCategories(1), $expected);

		$empty = $this->Category->getBoardCategories(2);
		$this->assertTrue(empty($empty));

		$this->assertTrue($this->Category->add('Category 2', 1));
		$expected[$this->Category->getLastInsertId()] = 'Category 2';

		$this->assertEqual($this->Category->getBoardCategories(1), $expected);
	}

}
?>
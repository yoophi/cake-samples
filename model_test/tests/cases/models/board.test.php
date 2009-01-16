<?php
/* SVN FILE: $Id: board.test.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* Board Test cases generated on: 2008-12-29 15:12:29 : 1230530969*/
App::import('Model', 'Board');

class BoardTestCase extends CakeTestCase {
	var $Board = null;
	var $fixtures = array('app.board', 'app.category', 'app.post', 'app.comment', 'app.user', 'app.tag', 'app.post_tag');
	var $sampleWithoutCategory = array('Board' => array(
			'name'  => 'sample1',
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
	var $sampleWithCategory = array('Board' => array(
			'name'  => 'sample2',
			'title'  => 'Lorem ipsum dolor sit amet',
			'use_attachment'  => 0,
			'use_category'  => 1,
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

	function startTest() {
		$this->Board =& ClassRegistry::init('Board');
	}

	function testBoardInstance() {
		$this->assertTrue(is_a($this->Board, 'Board'));
	}

	function testValidateFunctionIsUnique() {
		$this->assertTrue($this->Board->isUnique(array('name' => 'unique')));
		$this->Board->create();
		$this->Board->save(array('Board'=>array('name'=>'unique')), false);
		$this->assertFalse($this->Board->isUnique(array('name' => 'unique')));
		$this->assertTrue($this->Board->isUnique(array('name' => 'unique2')));
	}

	/**
	 * TODO:
	 *  - raw_converter에 대한 validation.
	 *  - theme의 값에 대한 validation.
	 */
	function testBoardValidates() {
		$data = array('Board' => array(
			'name'  => 'freebbs',
			'title'  => 'Lorem ipsum dolor sit amet',
			'theme'  => 'Lorem ipsum do',
			'post_per_page'  => 1,
			'perm_index'  => 1,
			'perm_read'  => 1,
			'perm_write'  => 1,
			'perm_delete'  => 1,
			'perm_notice'  => 1,
			'perm_comment'  => 1,
			'raw_converter'  => 'Lorem ip',
			'use_attachment'  => 0,
			'use_captcha'  => 1,
			'use_category'  => 1,
			'use_notice'  => 1,
			'use_secret_comment'  => 1,
			'use_secret_post'  => 1,
			));

		$data['Board']['name'] = '';
		$this->assertFalse($this->Board->save($data));
		$data['Board']['name'] = '한글';
		$this->assertFalse($this->Board->save($data));
		$data['Board']['perm_index'] = -1;
		$this->assertFalse($this->Board->save($data));
		$data['Board']['perm_index'] = 1;
		$data['Board']['use_captcha'] = 100;
		$this->assertFalse($this->Board->save($data));
	}

	function testBoardAdd() {
		$data = $this->sampleWithoutCategory;

		$this->assertTrue($this->Board->add($data));
		$result = $this->Board->read(null, $this->Board->getLastInsertID());
		$this->assertEqual($data['Board']['name'], $result['Board']['name']);

		$data['Board']['name'] = '';
		$this->assertFalse($this->Board->add($data));
	}

	function testBoardAddCategory() {
		$this->assertFalse($this->Board->addCategory(10, 'hello'));
		$this->assertTrue($this->Board->addCategory(1, 'hello'));
		$this->assertFalse($this->Board->addCategory(1, 'hello'));

		$this->assertTrue($this->Board->add($this->sampleWithCategory));
		$board_id = $this->Board->getLastInsertId();

		$this->assertTrue($this->Board->addCategory($board_id, 'Category 1'));
		$this->assertFalse($this->Board->addCategory($board_id, 'Category 1'));
		$this->assertTrue($this->Board->addCategory($board_id, 'Category 2'));
	}

	function testBoardGetSettings() {
		$data = $this->sampleWithoutCategory;
		$this->assertTrue($this->Board->add($data));
		$data['Board']['id'] = $this->Board->getLastInsertId();
		$result = $this->Board->getSettings($data['Board']['name']);
		$expected = array();
		foreach(array_keys($data['Board']) as $key) {
			$expected[$key] = $result[$key];
		}
		$this->assertEqual($data['Board'], $expected);
		$this->assertFalse(isset($result['categories']));

		$this->assertTrue($this->Board->add($this->sampleWithCategory));
		$board_id = $this->Board->getLastInsertId();

		$this->assertTrue($this->Board->Category->add('Category A', $board_id));
		$this->assertTrue($this->Board->Category->add('Category B', $board_id));

		$settings = $this->Board->getSettings($this->sampleWithCategory['Board']['name']);
		$expected = array('Category A', 'Category B');
		$this->assertEqual(array_values($settings['categories']), $expected);
	}

}
?>
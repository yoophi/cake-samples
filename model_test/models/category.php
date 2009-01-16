<?php
class Category extends AppModel {

	var $name = 'Category';
	var $belongsTo = array('Board');
	var $hasMany = array('Post');
	var $validate = array (
		'name' => array (
			'length' => array (
				'rule' => array ('between', 3, 30),
				'message' => '한글기준 1자 이상, 10자 이내로 입력해주십시오.'
			),
            'unique' => array (
                'rule' => array ('isUnique'),
				'message' => '이미 존재하는 분류이름입니다.'
            )
		),
		'board_id' => array (
			'type' => array (
				'rule' => 'numeric',
				'message' => '숫자만 가능합니다.'
			),
            'unique' => array (
                'rule' => 'isValidBoardId',
				'message' => '존재하지 않는 게시판번호 입니다.'
            )
		)
	);

	/**
	 * 해당 게시판에 동일한 이름의 category가 존재하는지 검사.
	 */
	function isUnique($data) {
		list($field, $name) = each($data);

		if (!empty($this->data['Category']['board_id'])) {
			$board_id = $this->data['Category']['board_id'];
		} else {
			return false;
		}

		$conditions = compact('name', 'board_id');
		return !$this->hasAny($conditions);
	}

	function isValidBoardId($data) {
		list($field, $value) = each($data);
		$conditions = array('Board.id' => $value);

		return $this->Board->hasAny($conditions);
	}

	function add($name, $board_id) {
		$data = array('Category' => compact('name', 'board_id'));

		if ($this->create($data) && $this->validates()) {
			$this->save($data, true, array('board_id', 'name'));
			return true;
		} else {
			return false;
		}
	}

	function getBoardCategories($board_id) {
		$conditions = compact('board_id');
		$order      = array('name'=>'ASC');
		return $this->find('list', compact('conditions', 'order'));
	}

}
?>
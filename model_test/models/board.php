<?php
class Board extends AppModel {

	var $name = 'Board';
	var $hasMany = array ('Category', 'Post', 'Comment');
	var $validate = array (
		'name' => array (
			'alphanumeric' => array (
				'rule' => array('custom', '/^[0-9a-z_]+$/i'),
				'message' => '영문과 숫자, _ 기호만 사용할 수 있습니다.'
			),
			'length' => array (
				'rule' => array ('between', 3, 11),
				'message' => '영문/숫자 기준 3자 이상, 10자 이내로 입력해주십시오.'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => '이미 존재하는 값은 사용할 수 없습니다.'
			)
		),
		'title' => array (
			'length' => array (
				'rule' => array ('between', 6, 60),
				'message' => '한글기준 2자 이상, 20자 이내로 입력해주십시오.'
			)
		),
		'use_attachment' => array(
            'rule' => array('boolean'),
            'message' => '0 또는 1만 입력할 수 있습니다.'
        ),
		'use_category' => array(
            'rule' => array('boolean'),
            'message' => '0 또는 1만 입력할 수 있습니다.'
        ),
		'use_captcha' => array(
            'rule' => array('boolean'),
            'message' => '0 또는 1만 입력할 수 있습니다.'
        ),
		//'thema',
		'post_per_page' => array (
			'rule' => array ('comparison', '>=', 1),
			'message' => '1보다 큰 값을 입력해주십시오.'
		),
		'perm_index' => array (
			'rule' => array ('numBetween', 0, 10),
			'message' => '0 이상, 255 이하의 값을 입력해주십시오.'
		),
		'perm_read' => array (
			'rule' => array ('numBetween', 0, 10),
			'message' => '0 이상, 255 이하의 값을 입력해주십시오.'
		),
		'perm_write' => array (
			'rule' => array ('numBetween', 0, 10),
			'message' => '0 이상, 255 이하의 값을 입력해주십시오.'
		),
		'perm_delete' => array (
			'rule' => array ('numBetween', 0, 10),
			'message' => '0 이상, 255 이하의 값을 입력해주십시오.'
		),
		'perm_comment' => array (
			'rule' => array ('numBetween', 0, 10),
			'message' => '0 이상, 255 이하의 값을 입력해주십시오.'
		)
	);

	function add($data) {
		$fields = array(
			'name', 'title', 'theme', 'post_per_page',
			'perm_index', 'perm_read', 'perm_write', 'perm_delete',
			'perm_notice', 'perm_comment', 'raw_converter',
			'use_attachment', 'use_captcha', 'use_category', 'use_notice',
			'use_secret_comment', 'use_secret_post', 'created'
			);

		if ($this->create($data) && $this->validates()) {
			return $this->save($data, true, $fields);
		} else {
			return false;
		}
	}

	function addCategory($board_id, $name) {
		return $this->Category->add($name, $board_id);
	}

	function getContent($id) {
		$conditions = compact('id');
		$contain    = array('Category');
		return $this->find('first', compact('conditions', 'contain'));
	}

	function getSettings($name) {
		$conditions = compact('name');
		$contain    = array();
		$result = $this->find('first', compact('conditions', 'contain'));
		if (!empty ($result['Board'])) {
			$settings = $result['Board'];
			$board_id = $settings['id'];
			if ($settings['use_category'] == 1) {
				$settings['categories'] = $this->Category->getBoardCategories($board_id);;
			}
			return $settings;
		} else {
			return false;
		}
	}

/*    function getNotices($id) {
        $setting = $this->find('first', array(
							'fields' => array('id', 'notices'),
							'conditions'=>array('Board.id'=>$id),
        					'contain'=>false));
        $setting = $setting['Board'];
        $ids = split(',', $setting['notices']);
        $notices = $this->Post->find('all', array (
                    'conditions' => array ('Post.board_id' => $id, 'Post.id'=>$ids),
                    'order' => array ('Post.created' => 'DESC'),
                    'contain' => false
                    ));

        return $notices;
    }

    function updateNotices($id) {
        $conditions = array('Post.board_id' => $id, 'Post.is_notice' => 1);
        $fields = array('Post.id');
        $contain = false;
        $order = array('Post.id' => 'ASC');
        $notices = $this->Post->find('all', compact('conditions','order', 'fields', 'contain'));

        $notices = Set::extract('/Post/id', $notices);
        $data = array('Board' => array('id' => $id, 'notices' => join(',', $notices)));
        return $this->save($data);
    }

    function addCategory() {

    }
*/
}
?>

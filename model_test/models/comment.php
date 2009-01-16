<?php
class Comment extends AppModel {

	var $name = 'Comment';
	var $belongsTo = array ('Post', 'User');

	var $validate = array (
		'name' => array (
			'length' => array (
				'rule' => array ('between', 3, 30),
				'message' => '한글기준 1자 이상, 10자 이내로 입력해주십시오.'
			)
		),
		'subject' => array (
			'length' => array (
				'rule' => array ('between', 6, 90),
				'message' => '한글기준 2자 이상, 30자 이내로 입력해주십시오.'
			)
		),
		'body' => array (
			VALID_NOT_EMPTY
		)
	);

	function deleteThread($id, $post_id) {
		if($children = $this->getChildren($id, $post_id)) {
			//아래 코드는. $children변수 중, key가 'id'인 것을 recursive하게 찾아 그 값들의 배열을 저장한다.
			//array_walk_recursive 함수는 PHP5 이상에서 지원...
			/**
			$targets = array($id);
			$fn = create_function('$v, $k, $target', 'if($k == "id") { $target[] = $v; }');
			array_walk_recursive($children, $fn, &$targets);
			*/

			//php4에서도 적용할 수 있도록 변경한 코드.
			//$this->_flatten 이라는 재귀함수를 작성했음.
			$flatten = $this->_flatten($children);
			$targets = am((array) $id, Set::extract('/Comment/id', $flatten));
		} else {
			$targets = $id;
		}

		return $this->deleteAll(array('Comment.id'=>$targets));
	}


	function _flatten($array) {
		$ret = array();
    	foreach($array as $item) {
        	if(isset($item['children'])) {
            	$children = $item['children'];
                unset($item['children']);
                if(!empty($children)) {
                    $children = $this->_flatten($children);
                }
            }
            $ret[] = $item;
            foreach($children as $child) {
                $ret[] = $child;
            }
        }

        return $ret;
	}

	function getChildren($id, $post_id) {
		$conditions = compact('id', 'post_id');
		$fields     = array('id', 'parent_id');
		$contain 	= false;
		$parent = $this->find('first', compact('conditions', 'fields', 'contain'));
		if(empty($parent)) {
			return false;
		}

		extract($parent['Comment']);
		//$conditions = array("Comment.lft BETWEEN ? AND ?" => array($lft, $rght));
		$conditions = compact('post_id');
		$order      = array('Comment.created' => 'DESC');

		$children = $this->find('all', compact('conditions', 'order', 'contain'));
		$data = $this->__doThread($children, $id);
        //$data     = $this->find('threaded', compact('conditions', 'order', 'contain'));

		return $data;
	}

    function __doThread($data, $root) {
        $out = array();
        $sizeOf = sizeof($data);

        for ($ii = 0; $ii < $sizeOf; $ii++) {
            if (($data[$ii][$this->alias]['parent_id'] == $root) || (($root === null) && ($data[$ii][$this->alias]['parent_id'] == '0'))) {
                $tmp = $data[$ii];

                if (isset($data[$ii][$this->alias][$this->primaryKey])) {
                    $tmp['children'] = $this->__doThread($data, $data[$ii][$this->alias][$this->primaryKey]);
                } else {
                    $tmp['children'] = null;
                }

                $out[] = $tmp;
            }
        }

        return $out;
    }

    function getComment($id, $board_id) {
        $this->contain('User');
        $comment = $this->find(array('Comment.id'=>$id, 'Comment.board_id'=>$board_id));

        if(!empty($comment))
            return $comment;
        else
            return false;
    }

	function getPostComments($post_id) {
		$this->contain('User');
		$conditions = array ('Comment.post_id' => $post_id);
		$order = array ('Comment.created' => 'DESC');
		$comments = $this->findAllThreaded($conditions, null, $order);

		return $comments;
	}

}
?>

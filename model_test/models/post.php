<?php
class Post extends AppModel {

	var $name = 'Post';
    var $hasMany = array('Comment');
    var $belongsTo = array('Board', 'Category', 'User');
	var $hasAndBelongsToMany = array(
            'Tag' => array('className' => 'Tag', 'with' => 'PostTag')
	);
    var $validate = array(
        'name' => array(
            'rule' => array('between', 3, 30),
            'message' => '한글기준 1자 이상, 10자 이내로 입력해주십시오.'
        ),
        //'password',
        'subject' => array(
			'length' => array(
				'rule' => array ('between', 6, 90),
				'message' => '한글기준 2자 이상, 30자 이내로 입력해주십시오.'
			)
        ),
        'body' => array (
			VALID_NOT_EMPTY
		),
        'raw' => array (
			VALID_NOT_EMPTY
		),
        //'comments',
        //'hits',
        'ip_address' => array(
            'rule' => array('ip'),
            'message' => 'IP 주소를 입력해주십시오.'
        ),
    );

    function getPost($id, $board_id) {
        $conditions = array('Post.id'=>$id, 'Post.board_id'=>$board_id);
        $contain    = array();
        $post = $this->find('first', compact('conditions', 'contain'));

        if(!empty($post))
            return $post;
        else
            return false;
    }

    function beforeSave() {
    	if(!empty($this->data['Post']['raw'])) {
	    	if(!empty($this->data['Post']['raw_converter'])) {
				if($this->data['Post']['raw_converter'] == 'markdown') {
					App::import('vendor', 'markdown');
					$markdown = new MarkdownRenderer();
					$this->data['Post']['body'] = $markdown->render($this->data['Post']['raw']);
				}

				if($this->data['Post']['raw_converter'] == 'bbcode') {
					App::import('vendor', 'bbcode'.DS.'quickerubb');
					$parser = new ubbParser();
					$this->data['Post']['body'] = $parser->parse($this->data['Post']['raw']);
				}

				if($this->data['Post']['raw_converter'] == 'wysiwyg') {
					$this->data['Post']['body'] = $this->data['Post']['raw'];
				}
	    	} else {
	    		$this->data['Post']['body'] = $this->data['Post']['raw'];
	    	}
    	}

		return true;
	}

    /*
    function paginateCount($conditions, $recursive) {
        $this->contain();
        return $this->findCount($conditions, $recursive);
    }

    function paginate($conditions, $fields, $order, $limit, $page, $recursive) {
        $fields = array(
            'Post.id', 'Post.category_id', 'Post.user_id', 'Post.subject', 'Post.openid',
            'Post.name', 'Post.body', 'Post.comments', 'Post.hits', 'Post.is_secret', 'Post.modified', 'Post.created'
            );
        $contain = false;
        $posts = $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'contain'));
        $user_ids = array_unique(Set::extract($posts, '{n}.Post.user_id'));
        $key = array_search('0', $user_ids);
        if($key !== false) {
        	unset($user_ids[$key]);
        }

        if(!empty($user_ids)) {
	        $this->User->contain(false);
	        $users = $this->User->find('all', array(
	            'conditions'=>array('User.id'=>$user_ids),
	            'fields'=>array('User.id', 'User.name', 'User.username')
	            ));
	        $user_ids = Set::extract($users, '{n}.User.id');
	        $users = array_combine($user_ids, $users);
        }

        foreach($posts as $key => $post) {
            if(!empty($post['Post']['user_id']) && !empty($users[$post['Post']['user_id']]['User'])) {
                $posts[$key]['User'] = $users[$post['Post']['user_id']]['User'];
            }
        }
        return $posts;
    }
    */


    function increaseHitCount($id) {
    	uses('session');
    	$sessionObj = new CakeSession;

		if($sessionObj->check('bbs.readPosts')) {
			//$readPosts = $sessionObj->read('bbs.readPosts');
			$readPosts = array();
		} else {
			$readPosts = array();
		}

		if(!in_array($id, $readPosts)) {
	    	$data = $this->find('first', array('conditions'=>array('id'=>$id), 'fields'=>array('Post.id', 'Post.hits'), 'contain'=>array()));
	    	if(!empty($data['Post']['id'])) {
	    		$data['Post']['hits']++;
	    		$this->save($data);
	    	}

			$readPosts[] = $id;
			$sessionObj->write('bbs.readPosts', $readPosts);
		}
    }

    function updateCommentCount($id) {
		$this->Comment->contain();
    	$comments = $this->Comment->find('count', array('conditions' => array ('Comment.post_id' => $id)));
		$this->save(array(
				'Post' => array (
					'id' => $id,
					'comments' => $comments
				)
			));
		/**
		 *  아래방법으로 현재 액션의 queryLog를 얻을 수 있다.
    	$db =& ConnectionManager::getDataSource('default');
    	$db->_queriesLog = array();
		while($dump = array_shift($db->_queriesLog)) {
			echo $dump['query'] . '<hr/>';
		}
		*/
    }

}

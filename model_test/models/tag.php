<?php
class Tag extends AppModel {

	var $name = 'Tag';
	var $hasAndBelongsToMany = array(
			'Post' => array('className' => 'Post', 'with' => 'PostTag')
	);
    var $validate = array(
        'name' => array(
            'length' => array(
                'rule' => array('between', 3, 60),
                'message' => '한글기준 1자 이상, 20자 이내로 입력해주십시오.'
            ),
            'noSpace' => array(
                'rule' => array('checkNoSpace'),
                'message' => '공백문자는 입력할 수 없습니다.'
            )
        )
    );

}
?>

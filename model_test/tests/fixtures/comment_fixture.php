<?php 
/* SVN FILE: $Id: comment_fixture.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* Comment Fixture generated on: 2008-12-29 15:12:30 : 1230530970*/

class CommentFixture extends CakeTestFixture {
	var $name = 'Comment';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'board_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'user_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'post_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'parent_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'name' => array('type'=>'string', 'null' => false, 'length' => 60),
			'subject' => array('type'=>'string', 'null' => false, 'length' => 90),
			'body' => array('type'=>'text', 'null' => false),
			'ip_address' => array('type'=>'string', 'null' => false, 'length' => 15),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'lft' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'rght' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'password' => array('type'=>'string', 'null' => false, 'length' => 128),
			'is_secret' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'board_id'  => 1,
			'user_id'  => 1,
			'post_id'  => 1,
			'parent_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'subject'  => 'Lorem ipsum dolor sit amet',
			'body'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ip_address'  => 'Lorem ipsum d',
			'created'  => '2008-12-29 15:09:30',
			'modified'  => '2008-12-29 15:09:30',
			'lft'  => 1,
			'rght'  => 1,
			'password'  => 'Lorem ipsum dolor sit amet',
			'is_secret'  => 1
			));
}
?>
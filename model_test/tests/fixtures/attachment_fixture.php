<?php 
/* SVN FILE: $Id: attachment_fixture.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* Attachment Fixture generated on: 2008-12-29 15:12:29 : 1230530969*/

class AttachmentFixture extends CakeTestFixture {
	var $name = 'Attachment';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'post_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'filename' => array('type'=>'string', 'null' => false, 'length' => 128),
			'size' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'type' => array('type'=>'string', 'null' => false, 'length' => 60),
			'user_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'post_id'  => 1,
			'filename'  => 'Lorem ipsum dolor sit amet',
			'size'  => 1,
			'created'  => '2008-12-29 15:09:29',
			'type'  => 'Lorem ipsum dolor sit amet',
			'user_id'  => 1
			));
}
?>
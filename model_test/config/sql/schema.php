<?php
/* SVN FILE: $Id: schema.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* App schema generated on: 2008-12-29 12:12:30 : 1230519870*/
class AppSchema extends CakeSchema {
	var $name = 'App';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $attachments = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'extra' => 'auto_increment'),
			'post_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'filename' => array('type' => 'string', 'null' => false, 'length' => 128),
			'size' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'type' => array('type' => 'string', 'null' => false, 'length' => 60),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $boards = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'extra' => 'auto_increment'),
			'name' => array('type' => 'string', 'null' => false, 'length' => 60),
			'title' => array('type' => 'string', 'null' => false, 'length' => 60),
			'theme' => array('type' => 'string', 'null' => false, 'length' => 16),
			'notices' => array('type' => 'string', 'null' => false),
			'post_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
			'post_per_page' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_index' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_read' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_write' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_delete' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_notice' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 3),
			'perm_comment' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'raw_converter' => array('type' => 'string', 'null' => false, 'length' => 10),
			'use_attachment' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'use_captcha' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'use_category' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'use_notice' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'use_secret_comment' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'use_secret_post' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $categories = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'extra' => 'auto_increment'),
			'board_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'name' => array('type' => 'string', 'null' => false, 'length' => 60),
			'post_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $comments = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'extra' => 'auto_increment'),
			'board_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'post_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'parent_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'name' => array('type' => 'string', 'null' => false, 'length' => 60),
			'subject' => array('type' => 'string', 'null' => false, 'length' => 90),
			'body' => array('type' => 'text', 'null' => false),
			'ip_address' => array('type' => 'string', 'null' => false, 'length' => 15),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'lft' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'rght' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'password' => array('type' => 'string', 'null' => false, 'length' => 128),
			'is_secret' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $post_tags = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'extra' => 'auto_increment'),
			'post_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'tag_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $posts = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'extra' => 'auto_increment'),
			'board_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'category_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'name' => array('type' => 'string', 'null' => false, 'length' => 128),
			'passwd' => array('type' => 'string', 'null' => false, 'length' => 128),
			'subject' => array('type' => 'string', 'null' => false),
			'body' => array('type' => 'text', 'null' => false),
			'html' => array('type' => 'text', 'null' => false),
			'comment_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
			'hit_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
			'ip_address' => array('type' => 'string', 'null' => false, 'length' => 15),
			'is_notice' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'is_secret' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $tags = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'extra' => 'auto_increment'),
			'name' => array('type' => 'string', 'null' => false, 'length' => 128),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $users = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'extra' => 'auto_increment'),
			'username' => array('type' => 'string', 'null' => false, 'length' => 128, 'key' => 'unique'),
			'passwd' => array('type' => 'string', 'null' => false, 'length' => 64),
			'name' => array('type' => 'string', 'null' => false, 'length' => 50),
			'phone' => array('type' => 'string', 'null' => false, 'length' => 16),
			'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'from' => array('type' => 'string', 'null' => false, 'length' => 32),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'last_visit' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'level' => array('type' => 'integer', 'null' => false, 'default' => '9', 'length' => 10),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
}
?>
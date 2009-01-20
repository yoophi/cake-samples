<?php 
/* SVN FILE: $Id$ */
/* Post Fixture generated on: 2009-01-20 14:01:31 : 1232428471*/

App::import('Vendor', 'CakeTestYamlFixture');
class PostFixture extends CakeTestYamlFixture {
	var $name = 'Post';
	var $table = 'posts';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'title' => array('type'=>'string', 'null' => false),
			'body' => array('type'=>'text', 'null' => false),
			'created' => array('type'=>'datetime', 'null' => false),
			'modified' => array('type'=>'datetime', 'null' => false),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);

}
?>
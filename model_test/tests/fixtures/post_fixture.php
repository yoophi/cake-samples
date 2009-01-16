<?php
/* SVN FILE: $Id: post_fixture.php,v 1.2 2008/12/31 06:13:16 yoophi Exp $ */
/* Post Fixture generated on: 2008-12-29 15:12:31 : 1230530971*/

class PostFixture extends CakeTestFixture {
	var $name = 'Post';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'board_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'category_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'user_id' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 10),
			'name' => array('type'=>'string', 'null' => false, 'length' => 128),
			'subject' => array('type'=>'string', 'null' => false),
			'body' => array('type'=>'text', 'null' => false),
			'ip_address' => array('type'=>'string', 'null' => false, 'length' => 15),
			'is_notice' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'is_secret' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'passwd' => array('type'=>'string', 'null' => false, 'length' => 128),
			'html' => array('type'=>'text', 'null' => false),
			'comment_count' => array('type'=>'integer', 'null' => false, 'default' => '0'),
			'hit_count' => array('type'=>'integer', 'null' => false, 'default' => '0'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);

    function __construct($conn) {
        $this->__loadYamlRecords();
        parent::__construct($conn);
    }

    function __loadYamlRecords() {
        App::import('Vendor', 'Yaml', array('file'=>'yaml.php'));
        $path = dirname(__FILE__).DS.'yaml'.DS.strtolower($this->name).'_fixture.yaml';
        $this->records = Horde_Yaml::loadFile($path);
    }
}
?>
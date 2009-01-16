<?php
/* SVN FILE: $Id: board_fixture.php,v 1.2 2008/12/29 15:16:34 yoophi Exp $ */
/* Board Fixture generated on: 2008-12-29 15:12:29 : 1230530969*/

class BoardFixture extends CakeTestFixture {
	var $name = 'Board';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => false, 'length' => 60),
			'title' => array('type'=>'string', 'null' => false, 'length' => 60),
			'use_attachment' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'use_category' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'theme' => array('type'=>'string', 'null' => false, 'length' => 16),
			'notices' => array('type'=>'string', 'null' => false),
			'post_per_page' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_index' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_read' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_write' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_delete' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'perm_notice' => array('type'=>'integer', 'null' => false, 'default' => '1', 'length' => 3),
			'perm_comment' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 3),
			'raw_converter' => array('type'=>'string', 'null' => false, 'length' => 10),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'use_captcha' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'use_notice' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'use_secret_comment' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'use_secret_post' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
			'post_count' => array('type'=>'integer', 'null' => false, 'default' => '0'),
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

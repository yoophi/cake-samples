<?php
App::import('Vendor', 'Yaml');
class CakeTestYamlFixture extends CakeTestFixture {
	
	function __construct($conn) {
		$this->_loadYamlRecords();
		parent::__construct($conn);
	}
	
	function _loadYamlRecords() {
		$path     = TESTS.'fixtures'.DS;
		$filename = Inflector::tableize($this->name).'.yml';
		if (is_file($path.$filename)) {
			$this->records = Horde_Yaml::loadFile($path.$filename);
		}
	}
	
}
?>
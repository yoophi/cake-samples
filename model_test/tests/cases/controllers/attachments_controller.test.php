<?php 
/* SVN FILE: $Id: attachments_controller.test.php,v 1.1 2008/12/29 10:33:44 yoophi Exp $ */
/* AttachmentsController Test cases generated on: 2008-12-29 14:12:34 : 1230529654*/
App::import('Controller', 'Attachments');

class TestAttachments extends AttachmentsController {
	var $autoRender = false;
}

class AttachmentsControllerTest extends CakeTestCase {
	var $Attachments = null;

	function setUp() {
		$this->Attachments = new TestAttachments();
		$this->Attachments->constructClasses();
	}

	function testAttachmentsControllerInstance() {
		$this->assertTrue(is_a($this->Attachments, 'AttachmentsController'));
	}

	function tearDown() {
		unset($this->Attachments);
	}
}
?>
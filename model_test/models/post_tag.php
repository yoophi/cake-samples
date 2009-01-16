<?php
class PostTag extends AppModel {

	var $name = 'PostTag';
	var $belongsTo = array('Post', 'Tag');

}
?>

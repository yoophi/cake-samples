<div class="boards form">
<?php echo $form->create('Board');?>
	<fieldset>
 		<legend><?php __('Add Board');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('title');
		echo $form->input('use_attachment');
		echo $form->input('use_category');
		echo $form->input('theme');
		echo $form->input('notices');
		echo $form->input('post_per_page');
		echo $form->input('perm_index');
		echo $form->input('perm_read');
		echo $form->input('perm_write');
		echo $form->input('perm_delete');
		echo $form->input('perm_notice');
		echo $form->input('perm_comment');
		echo $form->input('raw_converter');
		echo $form->input('use_captcha');
		echo $form->input('use_notice');
		echo $form->input('use_secret_comment');
		echo $form->input('use_secret_post');
		echo $form->input('post_count');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Boards', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Categories', true), array('controller'=> 'categories', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Category', true), array('controller'=> 'categories', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Posts', true), array('controller'=> 'posts', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Post', true), array('controller'=> 'posts', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Comments', true), array('controller'=> 'comments', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Comment', true), array('controller'=> 'comments', 'action'=>'add')); ?> </li>
	</ul>
</div>

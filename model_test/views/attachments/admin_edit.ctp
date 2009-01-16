<div class="attachments form">
<?php echo $form->create('Attachment');?>
	<fieldset>
 		<legend><?php __('Edit Attachment');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('post_id');
		echo $form->input('filename');
		echo $form->input('size');
		echo $form->input('type');
		echo $form->input('user_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Attachment.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Attachment.id'))); ?></li>
		<li><?php echo $html->link(__('List Attachments', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Posts', true), array('controller'=> 'posts', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Post', true), array('controller'=> 'posts', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>

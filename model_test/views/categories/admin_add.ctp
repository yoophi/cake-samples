<div class="categories form">
<?php echo $form->create('Category');?>
	<fieldset>
 		<legend><?php __('Add Category');?></legend>
	<?php
		echo $form->input('board_id');
		echo $form->input('name');
		echo $form->input('post_count');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Categories', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Boards', true), array('controller'=> 'boards', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Board', true), array('controller'=> 'boards', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Posts', true), array('controller'=> 'posts', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Post', true), array('controller'=> 'posts', 'action'=>'add')); ?> </li>
	</ul>
</div>

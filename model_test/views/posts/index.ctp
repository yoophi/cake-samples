<div class="posts index">
<h2><?php __('Posts');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('board_id');?></th>
	<th><?php echo $paginator->sort('category_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('subject');?></th>
	<th><?php echo $paginator->sort('body');?></th>
	<th><?php echo $paginator->sort('ip_address');?></th>
	<th><?php echo $paginator->sort('is_notice');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('is_secret');?></th>
	<th><?php echo $paginator->sort('passwd');?></th>
	<th><?php echo $paginator->sort('html');?></th>
	<th><?php echo $paginator->sort('comment_count');?></th>
	<th><?php echo $paginator->sort('hit_count');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($posts as $post):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $post['Post']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($post['Board']['title'], array('controller'=> 'boards', 'action'=>'view', $post['Board']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($post['Category']['name'], array('controller'=> 'categories', 'action'=>'view', $post['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($post['User']['name'], array('controller'=> 'users', 'action'=>'view', $post['User']['id'])); ?>
		</td>
		<td>
			<?php echo $post['Post']['name']; ?>
		</td>
		<td>
			<?php echo $post['Post']['subject']; ?>
		</td>
		<td>
			<?php echo $post['Post']['body']; ?>
		</td>
		<td>
			<?php echo $post['Post']['ip_address']; ?>
		</td>
		<td>
			<?php echo $post['Post']['is_notice']; ?>
		</td>
		<td>
			<?php echo $post['Post']['created']; ?>
		</td>
		<td>
			<?php echo $post['Post']['modified']; ?>
		</td>
		<td>
			<?php echo $post['Post']['is_secret']; ?>
		</td>
		<td>
			<?php echo $post['Post']['passwd']; ?>
		</td>
		<td>
			<?php echo $post['Post']['html']; ?>
		</td>
		<td>
			<?php echo $post['Post']['comment_count']; ?>
		</td>
		<td>
			<?php echo $post['Post']['hit_count']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $post['Post']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $post['Post']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Post', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Boards', true), array('controller'=> 'boards', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Board', true), array('controller'=> 'boards', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Categories', true), array('controller'=> 'categories', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Category', true), array('controller'=> 'categories', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Comments', true), array('controller'=> 'comments', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Comment', true), array('controller'=> 'comments', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tags', true), array('controller'=> 'tags', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tag', true), array('controller'=> 'tags', 'action'=>'add')); ?> </li>
	</ul>
</div>

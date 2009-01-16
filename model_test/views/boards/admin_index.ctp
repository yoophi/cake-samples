<div class="boards index">
<h2><?php __('Boards');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('use_attachment');?></th>
	<th><?php echo $paginator->sort('use_category');?></th>
	<th><?php echo $paginator->sort('theme');?></th>
	<th><?php echo $paginator->sort('notices');?></th>
	<th><?php echo $paginator->sort('post_per_page');?></th>
	<th><?php echo $paginator->sort('perm_index');?></th>
	<th><?php echo $paginator->sort('perm_read');?></th>
	<th><?php echo $paginator->sort('perm_write');?></th>
	<th><?php echo $paginator->sort('perm_delete');?></th>
	<th><?php echo $paginator->sort('perm_notice');?></th>
	<th><?php echo $paginator->sort('perm_comment');?></th>
	<th><?php echo $paginator->sort('raw_converter');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('use_captcha');?></th>
	<th><?php echo $paginator->sort('use_notice');?></th>
	<th><?php echo $paginator->sort('use_secret_comment');?></th>
	<th><?php echo $paginator->sort('use_secret_post');?></th>
	<th><?php echo $paginator->sort('post_count');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($boards as $board):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $board['Board']['id']; ?>
		</td>
		<td>
			<?php echo $board['Board']['name']; ?>
		</td>
		<td>
			<?php echo $board['Board']['title']; ?>
		</td>
		<td>
			<?php echo $board['Board']['use_attachment']; ?>
		</td>
		<td>
			<?php echo $board['Board']['use_category']; ?>
		</td>
		<td>
			<?php echo $board['Board']['theme']; ?>
		</td>
		<td>
			<?php echo $board['Board']['notices']; ?>
		</td>
		<td>
			<?php echo $board['Board']['post_per_page']; ?>
		</td>
		<td>
			<?php echo $board['Board']['perm_index']; ?>
		</td>
		<td>
			<?php echo $board['Board']['perm_read']; ?>
		</td>
		<td>
			<?php echo $board['Board']['perm_write']; ?>
		</td>
		<td>
			<?php echo $board['Board']['perm_delete']; ?>
		</td>
		<td>
			<?php echo $board['Board']['perm_notice']; ?>
		</td>
		<td>
			<?php echo $board['Board']['perm_comment']; ?>
		</td>
		<td>
			<?php echo $board['Board']['raw_converter']; ?>
		</td>
		<td>
			<?php echo $board['Board']['created']; ?>
		</td>
		<td>
			<?php echo $board['Board']['use_captcha']; ?>
		</td>
		<td>
			<?php echo $board['Board']['use_notice']; ?>
		</td>
		<td>
			<?php echo $board['Board']['use_secret_comment']; ?>
		</td>
		<td>
			<?php echo $board['Board']['use_secret_post']; ?>
		</td>
		<td>
			<?php echo $board['Board']['post_count']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $board['Board']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $board['Board']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $board['Board']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $board['Board']['id'])); ?>
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
		<li><?php echo $html->link(__('New Board', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Categories', true), array('controller'=> 'categories', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Category', true), array('controller'=> 'categories', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Posts', true), array('controller'=> 'posts', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Post', true), array('controller'=> 'posts', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Comments', true), array('controller'=> 'comments', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Comment', true), array('controller'=> 'comments', 'action'=>'add')); ?> </li>
	</ul>
</div>

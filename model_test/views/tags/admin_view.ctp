<div class="tags view">
<h2><?php  __('Tag');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tag['Tag']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tag['Tag']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tag['Tag']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Tag', true), array('action'=>'edit', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Tag', true), array('action'=>'delete', $tag['Tag']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tag['Tag']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Tags', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tag', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Posts', true), array('controller'=> 'posts', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Post', true), array('controller'=> 'posts', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Posts');?></h3>
	<?php if (!empty($tag['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Board Id'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Subject'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Ip Address'); ?></th>
		<th><?php __('Is Notice'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Is Secret'); ?></th>
		<th><?php __('Passwd'); ?></th>
		<th><?php __('Html'); ?></th>
		<th><?php __('Comment Count'); ?></th>
		<th><?php __('Hit Count'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Post'] as $post):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['board_id'];?></td>
			<td><?php echo $post['category_id'];?></td>
			<td><?php echo $post['user_id'];?></td>
			<td><?php echo $post['name'];?></td>
			<td><?php echo $post['subject'];?></td>
			<td><?php echo $post['body'];?></td>
			<td><?php echo $post['ip_address'];?></td>
			<td><?php echo $post['is_notice'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modified'];?></td>
			<td><?php echo $post['is_secret'];?></td>
			<td><?php echo $post['passwd'];?></td>
			<td><?php echo $post['html'];?></td>
			<td><?php echo $post['comment_count'];?></td>
			<td><?php echo $post['hit_count'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'posts', 'action'=>'view', $post['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'posts', 'action'=>'edit', $post['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'posts', 'action'=>'delete', $post['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Post', true), array('controller'=> 'posts', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>

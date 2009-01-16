<div class="users index">
<h2><?php __('Users');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('username');?></th>
	<th><?php echo $paginator->sort('passwd');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('phone');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('from');?></th>
	<th><?php echo $paginator->sort('last_visit');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('level');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($users as $user):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $user['User']['id']; ?>
		</td>
		<td>
			<?php echo $user['User']['username']; ?>
		</td>
		<td>
			<?php echo $user['User']['passwd']; ?>
		</td>
		<td>
			<?php echo $user['User']['name']; ?>
		</td>
		<td>
			<?php echo $user['User']['phone']; ?>
		</td>
		<td>
			<?php echo $user['User']['active']; ?>
		</td>
		<td>
			<?php echo $user['User']['from']; ?>
		</td>
		<td>
			<?php echo $user['User']['last_visit']; ?>
		</td>
		<td>
			<?php echo $user['User']['modified']; ?>
		</td>
		<td>
			<?php echo $user['User']['level']; ?>
		</td>
		<td>
			<?php echo $user['User']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $user['User']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $user['User']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
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
		<li><?php echo $html->link(__('New User', true), array('action'=>'add')); ?></li>
	</ul>
</div>
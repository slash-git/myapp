<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Items'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('category_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('item_name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('order_no');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('created');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($items as $item): ?>
			<tr>
				<td><?php echo h($item['Item']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($item['Category']['id'], array('controller' => 'categories', 'action' => 'view', $item['Category']['id'])); ?>
				</td>
				<td><?php echo h($item['Item']['item_name']); ?>&nbsp;</td>
				<td><?php echo h($item['Item']['order_no']); ?>&nbsp;</td>
				<td><?php echo h($item['Item']['created']); ?>&nbsp;</td>
				<td><?php echo h($item['Item']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $item['Item']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Item')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Categories')), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Category')), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Item');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($item['Item']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Category'); ?></dt>
			<dd>
				<?php echo $this->Html->link($item['Category']['id'], array('controller' => 'categories', 'action' => 'view', $item['Category']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Item Name'); ?></dt>
			<dd>
				<?php echo h($item['Item']['item_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Order No'); ?></dt>
			<dd>
				<?php echo h($item['Item']['order_no']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($item['Item']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($item['Item']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Item')), array('action' => 'edit', $item['Item']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Item')), array('action' => 'delete', $item['Item']['id']), null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Items')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Item')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Categories')), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Category')), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>


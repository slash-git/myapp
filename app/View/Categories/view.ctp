<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Category');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($category['Category']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Category Name'); ?></dt>
			<dd>
				<?php echo h($category['Category']['category_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Order No'); ?></dt>
			<dd>
				<?php echo h($category['Category']['order_no']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($category['Category']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($category['Category']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Category')), array('action' => 'edit', $category['Category']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Category')), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Categories')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Category')), array('action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>


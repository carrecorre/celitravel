<div class="restaurants form">
<?php echo $this->Form->create('Restaurant'); ?>
	<fieldset>
		<legend><?php echo __('Edit Restaurant'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('postal_code');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('web');
		echo $this->Form->input('province_id');
		echo $this->Form->input('town');
		echo $this->Form->input('monday_open');
		echo $this->Form->input('monday_close');
		echo $this->Form->input('tuesday_open');
		echo $this->Form->input('tuesday_close');
		echo $this->Form->input('wednesday_open');
		echo $this->Form->input('wednesday_close');
		echo $this->Form->input('thursday_open');
		echo $this->Form->input('thursday_close');
		echo $this->Form->input('friday_open');
		echo $this->Form->input('friday_close');
		echo $this->Form->input('saturday_open');
		echo $this->Form->input('saturday_close');
		echo $this->Form->input('sunday_open');
		echo $this->Form->input('sunday_close');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Restaurant.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Restaurant.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Provinces'), array('controller' => 'provinces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Province'), array('controller' => 'provinces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('controller' => 'reviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), array('controller' => 'reviews', 'action' => 'add')); ?> </li>
	</ul>
</div>

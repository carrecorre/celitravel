<?php

$this->Paginator->options(
					array(
						'update' => '#users-container',
						'before' => $this->Js->get('processing')->effect('fadeIn', array('buffer' => false)),
						'complete' => $this->Js->get('processing')->effect('fadeOut', array('buffer' => false))
					)	
	);

?>
<div id="users-container">

<div class="page-header">
	<h2><?php echo __('Users'); ?></h2>

</div>

<div class="col-md-12">

	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('surname'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('creation_date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['surname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['creation_date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'),
										array(
											'action' => 'view', 
											$user['User']['id']),
										array('class'=> 'btn btn-secondary')
										); ?>
			<?php echo $this->Html->link(__('Edit'), 
										array(
											'action' => 'edit', 
											$user['User']['id']),
										array('class'=> 'btn btn-secondary')
										); ?>
			<?php echo $this->Form->postLink(__('Delete'),
										array(
											'action' => 'delete', 
											$user['User']['id']), 
										array('class'=> 'btn btn-secondary'),
										array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'btn'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'btn'));
	?>
	</div>

	<?php $this->Js->writeBuffer(); ?> 

</div>

<div class="page-header">
	<h2><?php echo __('Restaurants'); ?></h2>

	<?php
    echo $this->Html->link('Crear restaurante', 
                            array(
                                'controller' => 'restaurants',
                                'action' => 'add'
                                )
                            );
?>

</div>

	<div class="col-md-12">

	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('Dd'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('Dirección'); ?></th>
			<th><?php echo $this->Paginator->sort('province_id'); ?></th>
			<th><?php echo $this->Paginator->sort('town'); ?></th>
			<th><?php echo $this->Paginator->sort('teléfono'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('web'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($restaurants as $restaurant): ?>
	<tr>
		<td><?php echo h($restaurant['Restaurant']['id']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['name']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['address']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Province']['name']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['town']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['phone']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['email']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['web']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), 
									array(
											'action' => 'view', 
											$restaurant['Restaurant']['id']),
									array('class'=> 'btn btn-secondary')
									); ?>
			<?php echo $this->Html->link(__('Edit'), 
									array(
										'action' => 'edit', 
										$restaurant['Restaurant']['id']),
									array('class'=> 'btn btn-secondary')
									); ?>
			<?php echo $this->Form->postLink(__('Delete'), 
									array(
										'action' => 'delete', 
										$restaurant['Restaurant']['id']), 
									array('class'=> 'btn btn-secondary'),
									array('confirm' => __('Are you sure you want to delete # %s?', $restaurant['Restaurant']['id']),

										)
										); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled btn btn-secondary'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled btn btn-secondary'));
	?>
	</div>

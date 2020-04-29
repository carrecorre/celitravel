<div class="page-header">
	<h2><?php echo __('Restaurantes'); ?></h2>

	<?php
    echo $this->Html->link('Crear restaurante', 
                            array(
                                'controller' => 'restaurants',
                                'action' => 'add'
							),
							array('class'=> 'btn btn-secondary')
                            );
?>

</div>

<hr>

	<div class="col-md-12">

	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('Id'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('Dirección'); ?></th>
			<th><?php echo $this->Paginator->sort('Provincia'); ?></th>
			<th><?php echo $this->Paginator->sort('Población'); ?></th>
			<th><?php echo $this->Paginator->sort('Teléfono'); ?></th>
			<th><?php echo $this->Paginator->sort('Email'); ?></th>
			<th><?php echo $this->Paginator->sort('Web'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
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
			<?php echo $this->Html->link(__('Ver'), 
									array(
											'action' => 'view', 
											$restaurant['Restaurant']['id']),
									array('class'=> 'btn btn-secondary')
									); ?>
			<?php echo $this->Html->link(__('Editar'), 
									array(
										'action' => 'edit', 
										$restaurant['Restaurant']['id']),
									array('class'=> 'btn btn-secondary')
									); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), 
									array(
										'action' => 'delete', 
										$restaurant['Restaurant']['id']), 
									array('class'=> 'btn btn-secondary'),
									array('confirm' => '¿Estás seguro que quieres eliminar el restaurante?',
										)
									);
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

	</div>
	
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Página {:page} de {:pages}, {:current} registros de {:count} totales')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled btn btn-secondary'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled btn btn-secondary'));
	?>
	</div>

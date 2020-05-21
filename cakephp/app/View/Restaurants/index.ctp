<?php

$this->Paginator->options(array(
		'update' => '#container-restaurants',
		'before' => $this->Js->get('#processing')->effect('fadeIn', array('buffer' => false)),
		'complete' => $this->Js->get('#processing')->effect('fadeOut', array('buffer' => false)),
	));

?>

<div class="page-header">
	<h2><?php echo 'Restaurantes'; ?></h2>
</div>

<hr>
	<div id="container-restaurants">
	<div class="col-md-12">

	<div class="progress hidden" id="processing">
  <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>

	<table class="table table-striped">
	<thead>
	<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Población</th>
			<th>Provincia</th>
			<th>Teléfono</th>
			<th>Email</th>
			<th>Web</th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($restaurants as $restaurant): ?>
	<tr>
		<td><?php echo h($restaurant['Restaurant']['id']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['name']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['address']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['town']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Province']['name']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['phone']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['email']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['web']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('<span><i class="fas fa-eye"></i></span>', 
									array(
											'action' => 'view', 
											$restaurant['Restaurant']['id']),
									array(
										'escape'=> false
									)
									); ?>
			<?php echo $this->Html->link('<span><i class="fas fa-edit"></i></span>', 
									array(
										'action' => 'edit', 
										$restaurant['Restaurant']['id']),
										array(
											'escape'=> false
										)
									); ?>
			<?php echo $this->Form->postLink('<span><i class="fas fa-trash"></i></span>', 
									array(
										'action' => 'delete', 
										$restaurant['Restaurant']['id']),
										array(
											'escape'=> false
										),
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
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled btn btn-secondary'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled btn btn-secondary'));
	?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Página {:page} de {:pages}, {:count} resultados totales')
	));
	?>	
	</p>
	
	</div>
	</div>

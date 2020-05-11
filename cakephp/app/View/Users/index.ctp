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
	<h2><?php echo __('Usuarios'); ?></h2>

	<?php
    echo $this->Html->link('Crear usuario', 
                            array(
                                'controller' => 'users',
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
			
			<th><?php echo $this->Paginator->sort('Foto'); ?></th>
			<th><?php echo $this->Paginator->sort('Id'); ?></th>
			<th><?php echo $this->Paginator->sort('Rol'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('Apellidos'); ?></th>
			<th><?php echo $this->Paginator->sort('Email'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre de usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('Fecha de creación'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php 
				echo $this->Html->image(
					'../files/user/foto/'.$user['User']['foto_dir'].'/'.$user['User']['foto'],
					array(
						'class' => 'img-round'
						)
					); 
					?>&nbsp;</td>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['surname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['creation_date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'),
										array(
											'action' => 'view', 
											$user['User']['id']),
										array('class'=> 'btn btn-secondary')
										); ?>
			<?php echo $this->Html->link(__('Editar'), 
										array(
											'action' => 'edit', 
											$user['User']['id']),
										array('class'=> 'btn btn-secondary')
										); ?>
			<?php echo $this->Form->postLink(__('Eliminar'),
										array(
											'action' => 'delete', 
											$user['User']['id']), 
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


	<?php $this->Js->writeBuffer(); ?> 

</div>

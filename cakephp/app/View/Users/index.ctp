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
</div>

<hr>

<div class="col-md-12">

	<table class="table table-striped">
	<thead>
	<tr>
			
			<th>Foto</th>
			<th>Id</th>
			<th>Rol</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Email</th>
			<th>Nombre de usuario</th>
			<th>Fecha de creación</th>
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
						'class' => 'img-round-index'
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
		<?php echo $this->Html->link('<span><i class="fas fa-eye"></i></span>', 
									array(
											'action' => 'view', 
											$user['User']['id']),
									array(
										'escape'=> false
									)
									); ?>
			<?php echo $this->Html->link('<span><i class="fas fa-edit"></i></span>', 
									array(
											'action' => 'edit', 
											$user['User']['id']),
									array(
										'escape'=> false
									)
									); ?>
			<?php echo $this->Form->postLink('<span><i class="fas fa-trash"></i></span>', 
									array(
										'action' => 'delete', 
										$user['User']['id']),
										array(
											'escape'=> false
										),
									array('confirm' => '¿Estás seguro que quieres eliminar el usuario?',
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

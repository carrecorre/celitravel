

<div class="users form">
<?php echo $this->Form->create('User', array('type' => 'file', 'novalidate' => 'novalidate')); ?>
	<fieldset>
		<legend class='row'><?php echo __('Añadir usuario'); ?></legend>
	<?php
		echo $this->Form->input('role',
		array(
			'type' => 'hidden',
			'value' => 'user'
			)		
);
		echo $this->Form->input('name',
			array(
				'label' => ('Nombre'),
				'type' => 'text'
				)		
		);
		echo $this->Form->input('surname',
			array(
				'label' => ('Apellido'),
				'type' => 'text'
				)		
		);
		echo $this->Form->input('email',
			array(
				'label' => ('Email'),
				'type' => 'text'
				)		
		);
		echo $this->Form->input('username',
			array(
				'label' => ('Nombre de usuario'),
				'type' => 'text'
				)		
		);
		echo $this->Form->input('password',
			array(
				'label' => ('Contraseña'),
				'type' => 'password'
				)		
		);
		echo $this->Form->input('foto',
				array(
					'type'=> 'file',
					'label' => 'Foto de portada'
				)	
		);
		echo $this->Form->input('foto_dir', 
				array(
					'type'=> 'hidden',
				)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Registrar')); ?>
</div>

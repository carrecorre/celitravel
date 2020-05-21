<!-- Default form register -->
<?php echo $this->Form->create('User', 
							array('type' => 'file', 
								'novalidate' => 'novalidate',
								'class' => 'border border-light p-5')	
								); 
?>
   <p class="h2 mb-4 text-center">Editar usuario</p>
   <div class="row user-form">
	   <div class="col-md-6">
		<div class="form-row mb-4">
			<div class="col">
				<!-- First name -->
				<?php
					echo $this->Form->hidden('id');
				
					echo $this->Form->input('name',
						array(
							'label' => 'Nombre',
							'type' => 'text',
							'class' => 'form-control',
							'placeholder' => 'Nombre'
							)		
					);
							
				?>
			</div>
		</div>	
		<div class="form-row mb-4">
			<div class="col">
				<?php
					echo $this->Form->input('surname',
					array(
						'label' => 'Apellido',
						'type' => 'text',
						'class' => 'form-control',
						'placeholder' => 'Apellido'
						)		
				);

				?>
			</div>
		</div>
		<div class="form-row mb-4">
			<div class="col">
				<?php
					echo $this->Form->input('email',
					array(
						'label' => 'Email',
						'type' => 'text',
						'class' => 'form-control',
						'placeholder' => 'Email'
						)		
				);

				?>
			</div>
		</div>
		<div class="form-row mb-4">
			<div class="col">
				<?php
					echo $this->Form->input('username',
					array(
						'label' => 'Nombre de usuario',
						'type' => 'text',
						'class' => 'form-control',
						'placeholder' => 'Nombre de usuario'
						)		
				);

				?>
			</div>
		</div>
		
	</div>
	<div class="col-md-6">
			<div class="col-12 text-center">
				<?php
							echo $this->Html->image(
								'../files/user/foto/'.$user['User']['foto_dir'].'/'.$user['User']['foto'],
								array(
									'id' => 'user-img',
									'class' => 'img-user-big'
									)
								);
						?>
			</div>
			<div class="form-row mb-4">
				<div class="col">			

				<?php
				echo $this->Form->input('foto',
						array(
							'type'=> 'file',
							'id' => 'input-img',
							'label' => false,
							'class' => 'form-control'
						)	
				);
				echo $this->Form->input('foto_dir', 
						array(
							'type'=> 'hidden',
						)
				);
				
				?>
				</div>
			</div>
			<div class="col row">
				<div class="col form-buttons">
					<?php 
						$options = array(
							'label' => 'Guardar cambios',
							'class' => 'btn btn-info col',
						);
					echo $this->Form->end($options);?>
				</div>
				<div class="col form-buttons">
					<?php 
						echo $this->Html->link('Cancelar', 
												array(
													'controller'=>'users',
													'action' => 'view',
													$user['User']['id']
											),
												array(
													'class' => 'btn btn-danger col',
												)
										); 
					?>
				</div>	  
			</div>
		</div>
		</div>
	</div> 


<?php
echo $this->Html->css(Configure::read('MAPS_API_CSS'));
echo $this->Html->script(Configure::read('MAPS_API_JS'));
echo $this->Html->script('map');
echo $this->Html->script('select2.js', array('block' => 'script'));
echo $this->Html->script('lib/select2-4.0.0/dist/js/select2.full.min.js', array('block' => 'script'));
echo $this->Html->css('../js/lib/select2-4.0.0/dist/css/select2.min.css', array('block' => 'script'));
?>

	<?php 
		echo $this->Form->create('Restaurant', array('type' => 'file', 
													'novalidate' => 'novalidate',
													'class' => 'border border-light p-5'
												)
										); 
	?>
<div class="row">
	<p class="h2 text-center col">Añadir restaurante</p>
		
</div>
<div class="row restaurant-form">
	<div id="score" class="col-md-6 input-group">
		
		<div class="col-12">
			<h2 class="text-center">Datos</h2>
		</div>
		<div class="col-12">
		<?php
			echo $this->Form->input('name',
				array(
					'label' => ('Nombre'),
					'type' => 'text',
					'class' => 'form-control'
					)		
			);
			?>
			</div>
			<div class="col-12">
			<?php
			echo $this->Form->input('address',
			array(
				'label' =>'Dirección',
				'type' => 'text',
				'class' => 'form-control'
				)
			);
		?>
		</div>
		<div class="col-6">
		<?php
			echo $this->Form->input('postal_code',
			array(
				'label' =>'Código postal',
				'type' => 'text',
				'class' => 'form-control'
				)
			); 
		?>
				</div>
		<div class="col-6">
		<?php
			echo $this->Form->input('phone',
			array(
				'label' =>'Teléfono',
				'type' => 'text',
				'class' => 'form-control'
				)
			);
			?>
			</div>
			<div class="col-6">
			<?php
			echo $this->Form->input('email',
			array(
				'label' =>'Email',
				'type' => 'text',
				'class' => 'form-control'
				)
			);
			?>
			</div>
			<div class="col-6">
			<?php
			echo $this->Form->input('web',
			array(
				'label' =>'Web',
				'type' => 'text',
				'class' => 'form-control'
				)
			);
			?>
			</div>
			<div class="col-6">
			<?php
			echo $this->Form->input('province_id',array(
				'label' =>'Provincia',
				'type' => 'select',
				'empty' => true,
				'class' => 'form-control'

			));
			?>
			</div>
			<div class="col-6">
			<?php
			echo $this->Form->input('town',
			array(
				'label' =>'Población',
				'type' => 'text',
				'class' => 'form-control'
				)
			);
			?>
			</div>
			<div class="col-12">
			<?php
			echo $this->Form->input('RestaurantSpecialty.specialty_id',
			array(
				'label' =>'Especialidades',
				'type' => 'select',
				'class' => 'select2-multiple form-control',
				'multiple' => 'multiple',
				'options' => $specialties,
				'empty' => true,
			)
		);
		?>
		</div>
		<div class="col-12">
		<?php
			echo $this->Form->input('foto',
				array(
					'type'=> 'file',
					'label' => 'Foto de portada',
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
	<div id="timetable" class="col-md-3 ">
		<div class="col-12">
			<h2 class="text-center">Horario</h2>
		</div>
		<div class="form-row col">
			<div class="col-12 text-center">	
				<label>Lunes</label>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_open',
					array('class' => 'form-control'));
				?>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_close',
					array('class' => 'form-control'));
				?>
			</div>
		</div>
		<div class="form-row col">
			<div class="col-12 text-center">
				<label>Martes</label>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_open',
					array('class' => 'form-control'));
				?>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_close',
					array('class' => 'form-control'));
				?>
			</div>
		</div>
		<div class="form-row col">
			<div class="col-12 text-center">	
				<label>Miércoles</label>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_open',
					array('class' => 'form-control'));
				?>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_close',
					array('class' => 'form-control'));
				?>
			</div>
		</div>
		<div class="form-row col">
			<div class="col-12 text-center">
				<label>Jueves</label>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_open',
					array('class' => 'form-control'));
				?>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_close',
					array('class' => 'form-control'));
				?>
			</div>
		</div>
		<div class="form-row col">
			<div class="col-12 text-center">
				<label>Viernes</label>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_open',
					array('class' => 'form-control'));
				?>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_close',
					array('class' => 'form-control'));
				?>
			</div>
		</div>
		<div class="form-row col text-center">
			<div class="col-12">
				<label>Sábado</label>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_open',
					array('class' => 'form-control'));
				?>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_close',
					array('class' => 'form-control'));
				?>
			</div>
		</div>
		<div class="form-row col text-center">
			<div class="col-12">
				<label>Domingo</label>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_open',
					array('class' => 'form-control'));
				?>
			</div>
			<div class="col">
				<?php
					echo $this->Form->time('monday_close',
					array('class' => 'form-control'));
				?>
			</div>
		</div>
	</div>
	<div id="location" class="col-md-3">
	<div class="col-12">
			<h2 class="text-center">Localización</h2>
		</div>
		<div id="myMap"  class="map-edit"></div>
		<?php
			echo $this->Form->hidden('latitude',
			array(
				'label' =>'Latitud',
				'type' => 'text',
				'readonly' => 'readonly'
			)
			);
			echo $this->Form->hidden('longitude',
			array(
				'label' =>'Longitud',
				'type' => 'text',
				'readonly' => 'readonly'
				)
			);

			?>		
			<div class="col row">
			<div class="col form-buttons">
				<?php 
					$options = array(
						'label' => 'Registrar',
						'class' => 'btn btn-info col',
					);
				echo $this->Form->end($options);?>
			</div>
			<div class="col form-buttons">
				<?php 
					echo $this->Html->link('Cancelar', 
											array(
												'controller'=>'pages',
												'action' => 'home'
										),
											array(
												'class' => 'btn btn-danger col',
											)
									); 
				?>
			</div>	  
		</div>
	</div>
</div> <!-- end row -->



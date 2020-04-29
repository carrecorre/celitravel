<?php
echo $this->Html->css(Configure::read('MAPS_API_CSS'));
echo $this->Html->script(Configure::read('MAPS_API_JS'));
echo $this->Html->script('map');
echo $this->Html->script('select2.js', array('block' => 'script'));
echo $this->Html->script('lib/select2-4.0.0/dist/js/select2.full.min.js', array('block' => 'script'));
echo $this->Html->css('../js/lib/select2-4.0.0/dist/css/select2.min.css', array('block' => 'script'));
?>

<?php echo $this->Form->create('Restaurant', array('type' => 'file', 'novalidate' => 'novalidate')); ?>

<fieldset>
		<legend class="row"><?php echo __('Añadir restaurante'); ?></legend>		
<div class="row">	
	<div id="score"  class="col-md-3">
		<h2>Datos</h2>
		<?php
			echo $this->Form->input('name',
				array(
					'label' => ('Nombre'),
					'type' => 'text'
					)		
			);
			echo $this->Form->input('address',
			array(
				'label' =>'Dirección',
				'type' => 'text'
				)
			);
			echo $this->Form->input('postal_code',
			array(
				'label' =>'Código postal',
				'type' => 'text'
				)
			);
			echo $this->Form->input('phone',
			array(
				'label' =>'Teléfono',
				'type' => 'text'
				)
			);
			echo $this->Form->input('email',
			array(
				'label' =>'Email',
				'type' => 'text'
				)
			);
			echo $this->Form->input('web',
			array(
				'label' =>'Web',
				'type' => 'text'
				)
			);
			echo $this->Form->input('province_id',array(
				'label' =>'Provincia',
				'type' => 'select',
				'empty' => true,
			));
			echo $this->Form->input('town',
			array(
				'label' =>'Población',
				'type' => 'text'
				)
			);
			echo $this->Form->input('RestaurantSpecialty.specialty_id',
		array(
			'label' =>'Especialidades',
			'type' => 'select',
			'class' => 'select2-multiple',
			'multiple' => 'multiple',
			'options' => $specialties,
			'empty' => true,
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
	</div>
	<div id="timetable"  class="col-md-3">
		<h2>Horarios</h2>
			<div>
				<label>Lunes</label>
				<?php
					echo $this->Form->time('monday_open');
					echo $this->Form->time('monday_close');
				?>
			</div>
			<div>
				<label>Martes</label>
				<?php
					echo $this->Form->time('tuesday_open');
					echo $this->Form->time('tuesday_close');
				?>
			</div>
			<div>
				<label>Miércoles</label>
				<?php
					echo $this->Form->time('wednesday_open');
					echo $this->Form->time('wednesday_close');
				?>
			</div>
			<div>
				<label>Jueves</label>
				<?php
					echo $this->Form->time('thursday_open');
					echo $this->Form->time('thursday_close');
				?>
			</div>
			<div>
				<label>Viernes</label>
				<?php
					echo $this->Form->time('friday_open');
					echo $this->Form->time('friday_close');
				?>
			</div>
			<div>
				<label>Sábado</label>
				<?php
					echo $this->Form->time('saturday_open');
					echo $this->Form->time('saturday_close');
				?>
			</div>
			<div>
				<label>Domingo</label>
				<?php
					echo $this->Form->time('sunday_open');
					echo $this->Form->time('sunday_close');
				?>
			</div>
	</div>
	<div id="location" class="col-md-6">
	<h2>Localización</h2>
	
	<div id="myMap"  class="map-edit"></div>
	<?php
	echo $this->Form->input('latitude',
			array(
				'label' =>'Latitud',
				'type' => 'text',
				'readonly' => 'readonly'
			)
			);
			echo $this->Form->input('longitude',
			array(
				'label' =>'Longitud',
				'type' => 'text',
				'readonly' => 'readonly'
				)
			);

			?>
	</div>

<?php echo $this->Form->end(__('Añadir')); ?>
</div>
</fieldset>


<?php
echo $this->Html->css(Configure::read('MAPS_API_CSS'));
echo $this->Html->script(Configure::read('MAPS_API_JS'));
echo $this->Html->script('map');
echo $this->Html->script('select2.js', array('block' => 'script'));
echo $this->Html->script('lib/select2-4.0.0/dist/js/select2.full.min.js', array('block' => 'script'));
echo $this->Html->css('../js/lib/select2-4.0.0/dist/css/select2.min.css', array('block' => 'script'));

?>
<?php echo $this->Form->create('Restaurant'); ?>
<fieldset>
		<legend><h1><?php echo $restaurant['Restaurant']['name'] ?></h1></legend>		
<div class="row">	

	<div id="score"  class="col-md-3">
		<h2>Datos del restaurante</h2>
		<?php
		echo $this->Form->hidden('id');
			echo $this->Form->input('name',
				array(
					'label' => ('Nombre'),
					'type' => 'text'
					)		
			);
			echo $this->Form->input('address',
			array(
				'label' =>'Especialidades',
				'type' => 'text'
				)
			);
			echo $this->Form->input('postal_code');
			echo $this->Form->input('phone');
			echo $this->Form->input('email');
			echo $this->Form->input('web');
			echo $this->Form->input('province_id');
			echo $this->Form->input('town');
			echo $this->Form->input('RestaurantSpecialty.specialty_id',
		array(
			'label' =>'Especialidades',
			'type' => 'select',
			'class' => 'select2-multiple',
			'multiple' => 'multiple',
			'options' => $specialties,
			'value' => $restaurantSpecialties,
			'empty' => true,
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
	<div class="col-md-6">
	<h2>Localización</h2>
	<div id="myMap"></div>
	</div>

	
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</fieldset>


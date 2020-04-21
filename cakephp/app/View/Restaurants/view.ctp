<?php
echo $this->Html->css(Configure::read('MAPS_API_CSS'));
echo $this->Html->script(Configure::read('MAPS_API_JS'));
echo $this->Html->script('map-view');

?>


<h1><?php echo __($restaurant['Restaurant']['name']); ?></h1>


<div class="row">	

<div id="score"  class="col-md-3">
        <h2>Puntuación</h2>
			<p><?php echo count($restaurant['Review']) ?> opiniones</p>
			<p>General: </p>
			<p><?php echo $averages['general']; ?></p>
			<p>Conocimiento de la enfermedad: </p>
			<p><?php echo $averages['knowledge']; ?></p>
			<p>Adaptación de la carta: </p>
			<p><?php echo $averages['adaptation']; ?></p>

</div>

<div id="details" class="col-md-2">
	<h2>Detalles</h2>
	<h3>Horario</h3>
	<small>
		<p>Lunes: <?php echo $restaurant['Restaurant']['monday_open'] ?> - <?php echo $restaurant['Restaurant']['monday_close'] ?></p>
        <p>Martes: <?php echo $restaurant['Restaurant']['tuesday_open'] ?> - <?php echo $restaurant['Restaurant']['tuesday_close'] ?></p>
        <p>Miércoles: <?php echo $restaurant['Restaurant']['wednesday_open'] ?> - <?php echo $restaurant['Restaurant']['wednesday_close'] ?></p>
        <p>Jueves: <?php echo $restaurant['Restaurant']['thursday_open'] ?> - <?php echo $restaurant['Restaurant']['thursday_close'] ?></p>
        <p>Viernes: <?php echo $restaurant['Restaurant']['friday_open'] ?> - <?php echo $restaurant['Restaurant']['friday_close'] ?></p>
        <p>Sábado: <?php echo $restaurant['Restaurant']['saturday_open'] ?> - <?php echo $restaurant['Restaurant']['saturday_close'] ?></p>
        <p>Domingo: <?php echo $restaurant['Restaurant']['sunday_open'] ?> - <?php echo $restaurant['Restaurant']['sunday_close'] ?></p>
	</small>
		<h3>Especialidades:</h3>
		<?php

		foreach($specialties as $specialty){
			echo '<p>'.$specialty."</p>";
		};
		?>
</div>



<div id="timetable"  class="col-md-2">
	
</div>

<div id="location" class="col-md-4">
	
		<h2>Ubicación y contacto</h2>
		<p>
			<?php echo $restaurant['Restaurant']['address']; ?> -
			<?php echo $restaurant['Restaurant']['town'].','; ?>	
			<?php echo $restaurant['Restaurant']['postal_code'].','; ?>
			<?php echo $restaurant['Province']['name']; ?>
			<?php echo '('.$restaurant['Province']['community'].')'; ?>
		<p>
		<p id="latitude" class="hidden"><?php echo $restaurant['Restaurant']['latitude']; ?> </p>
		<p id="longitude" class="hidden"><?php echo $restaurant['Restaurant']['longitude']; ?> </p>
		

<div id="myMap"></div>
		<p><?php echo __('Teléfono: '); ?><?php echo h($restaurant['Restaurant']['phone']); ?>	
		</p>
		<p><?php echo __('Email: '); ?><?php echo h($restaurant['Restaurant']['email']); ?>	
		</p>
		<p><?php echo __('Web: '); ?><?php echo h($restaurant['Restaurant']['web']); ?>
		</p>
		
</div>
</div>  <!-- fin del row -->

<hr>

<h2>Opiniones</h2>
<?php if (!empty($restaurant['Review'])): ?>

	<div id="reviews" class="row">
				
			<?php foreach($restaurant['Review'] as $review){ ?>

			<div class="col-md-2">
				<?php
					echo 'Opinión de: ';
					echo '<p>'.$review['username'].'<p>';
				?>
			</div>
			<div class="col-md-6">
				<?php
					echo '<p><span>Opinión escrita: </span>'.$review['date'].'<span> Puntuación: </span>'.$review['general_rate'].' '.$review['gluten_knowledge'].' '.$review['gluten_adaptation'];
					echo '<p>'.$review['review'].'<p>';

					
				}

			?>
				
	
	</div>  <!-- fin del row -->
<?php endif; ?> 




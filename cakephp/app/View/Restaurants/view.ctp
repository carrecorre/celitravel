<?php
echo $this->Html->css(Configure::read('MAPS_API_CSS'));
echo $this->Html->script(Configure::read('MAPS_API_JS'));
echo $this->Html->script('map-view');
echo $this->Html->script('review');
?>


<h1><?php
echo __($restaurant['Restaurant']['name']); ?></h1>


<div class="row">	

<div id="score"  class="col-md-3">
        <h2>Puntuación</h2>
			<p><?php echo count($restaurant['Review']) ?> opiniones</p>
			General: 
			<p class="clasificacion">
				<?php
					$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
					$attributes = array(
									'legend' => false, 
									'disabled' => 'disabled',
									'value' => round($averages['general'])
								);
					echo $this->Form->radio('general_rate', $options, $attributes,
					array(
						'class' => 'form-star'
					  ));
				?>
			</p>
			Conocimiento de la enfermedad:
			<p class="clasificacion">
				<?php
					$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
					$attributes = array(
									'legend' => false, 
									'disabled' => 'disabled',
									'value' => round($averages['knowledge'])
								);
					echo $this->Form->radio('knowledge_rate', $options, $attributes);
				?>
			</p>
			Adaptación de la carta: 
			<p class="clasificacion">
				<?php
					$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
					$attributes = array(
									'legend' => false, 
									'disabled' => 'disabled',
									'value' => round($averages['adaptation'])
								);
					echo $this->Form->radio('adaptation_rate', $options, $attributes);
				?>
			</p>
			<h3>Especialidades:</h3>
		<?php

		foreach($specialties as $specialty){
			echo '<p>'.$specialty."</p>";
		};
		?>

</div>

<div id="details" class="col-md-2">
				<?php 
				echo $this->Html->image(
					'../files/restaurant/foto/'.$restaurant['Restaurant']['foto_dir'].'/'.$restaurant['Restaurant']['foto'],
					array(
						'class' => 'thumbnail'
						)
					); 
					?>
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
		

<div id="myMap" class="map-view"></div>
		<p><?php echo __('Teléfono: '); ?><?php echo h($restaurant['Restaurant']['phone']); ?>	
		</p>
		<p><?php echo __('Email: '); ?><?php echo h($restaurant['Restaurant']['email']); ?>	
		</p>
		<p><?php echo __('Web: '); ?><?php echo h($restaurant['Restaurant']['web']); ?>
		</p>
		
</div>
</div>  <!-- fin del row -->

<hr>

<div id="reviews">
<h2>Opiniones</h2>
<div id="add-review">
<?php 
if(isset($current_user)){
	echo $this->Html->link('Añadir comentario', 
                                        array(
                                            'controller'=>'reviews',
                                            'action' => 'add'
                                      ),
                                          array(
                                            'class' => 'btn ',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#exampleModal'
                                          )
                                        ); 
}
                
		  ?>
		  </div>
<?php if (!empty($restaurant['Review'])): ?>

	<div id="reviews" class="row">
			
			<?php foreach($restaurant['Review'] as $review){ ?>
			<div class="row col-md-8">
				<div class="col-md-2">
					<?php
						echo 'Opinión de: '.$review['username'];
					?>
				</div>
				<div class="col-md-2">
					
					<small>General</small>
					<p class="clasificacion">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
											'legend' => false, 
											'disabled' => 'disabled',
											'value' => round($review['general_rate'])
										);
							echo $this->Form->radio('general_rate'.$review['id'], $options, $attributes);
						?>
					</p>
					<small>Conocimiento	</small>
					<p class="clasificacion">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
											'legend' => false, 
											'disabled' => 'disabled',
											'value' => round($review['gluten_knowledge'])
										);
							echo $this->Form->radio('gluten_knowledge'.$review['id'], $options, $attributes);
						?>
					</p>
					<small>Adaptación</small>
					<p class="clasificacion">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
											'legend' => false, 
											'disabled' => 'disabled',
											'value' => round($review['gluten_adaptation'])
										);
							echo $this->Form->radio('gluten_adaptation'.$review['id'], $options, $attributes);
						?>
					</p>
				</div>
				<div class="col-md-8">
					<?php
						echo '<small>'.$review['date'].'</small>';
						echo '<p>'.$review['review'].'<p>';

				?>
				</div>
			</div>
			<?php } ?>
				
	
	</div>  <!-- fin del row -->
<?php endif; ?> 
									</div>


<?php echo $this->element('modalReview'); ?>
<?php
echo $this->Html->css(Configure::read('MAPS_API_CSS'));
echo $this->Html->script(Configure::read('MAPS_API_JS'));
echo $this->Html->script('map-view');
echo $this->Html->script('review');
?>

<?php
if(isset($this->Paginator)){
$this->Paginator->options(array(
		'update' => '#container-reviews',
		
    ));
    
$current = $this->Paginator->counter(
    array(
        'format' => '{:page}'
    )
);

$numbers = $this->Paginator->numbers(
    array(
        'separator' => '',
        'tag' => 'li'
    )
);
}
?>

<div>
	<div class="row">
		<div class="col">
		<h1><?php echo $restaurant['Restaurant']['name']; ?></h1>

		</div>
	</div>
	<div class="row">

		<div id="score"  class="col">
		<b><?php echo count($restaurant['Review']) ?> opiniones</b>
		<span>  |  </span>
			General: 
			<span class="clasificacion">
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
			</span>
			<span>  |  </span>
			Conocimiento de la enfermedad:
			<span class="clasificacion">
				<?php
					$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
					$attributes = array(
									'legend' => false, 
									'disabled' => 'disabled',
									'value' => round($averages['knowledge'])
								);
					echo $this->Form->radio('knowledge_rate', $options, $attributes);
				?>
			</span>
			<span>  |  </span>
			Adaptación de la carta: 
			<span class="clasificacion">
				<?php
					$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
					$attributes = array(
									'legend' => false, 
									'disabled' => 'disabled',
									'value' => round($averages['adaptation'])
								);
					echo $this->Form->radio('adaptation_rate', $options, $attributes);
				?>
			</span>	
		</div>
		
	</div>
	<div class="row">
		<div class="col">
		<span>
			<i class="fas fa-map-marker-alt"></i>
			<?php echo $restaurant['Restaurant']['address']; ?> -
			<?php echo $restaurant['Restaurant']['town'].','; ?>	
			<?php echo $restaurant['Restaurant']['postal_code'].','; ?>
			<?php echo $restaurant['Province']['name']; ?>
			<?php echo '('.$restaurant['Province']['community'].')'; ?>
		</span>
		<span> | </span>
		<span>
			<i class="fas fa-phone"></i>
			<?php echo $restaurant['Restaurant']['phone']; ?>	
		</span>
		<span> | </span>
		<span>
			<i class="fas fa-mail-bulk"></i>
			<?php echo $restaurant['Restaurant']['email']; ?>	
		</span>
		<span> | </span>
		<span>
			<i class="fas fa-laptop"></i>
			<?php echo $restaurant['Restaurant']['web']; ?>
		</span>

		<p id="latitude" class="hidden"><?php echo $restaurant['Restaurant']['latitude']; ?> </p>
		<p id="longitude" class="hidden"><?php echo $restaurant['Restaurant']['longitude']; ?> </p>
		</div>
	</div>
	<div class ="row">
		<div class="col">
			<span>
				<i class="fas fa-utensils"></i>
				<?php
					foreach($specialties as $specialty){
						echo " | ".$specialty;
					}
				?>
			</span>
		</div>
	</div>
	<div class ="row">
		<div class="col-md-4">
		<h3>Ubicación</h3>
			<div id="myMap" class="map-view rounded"></div>
		</div>
		
		<div class="col-md-6">
		<h3>Imágenes</h3>
		<?php 
				echo $this->Html->image(
					'../files/restaurant/foto/'.$restaurant['Restaurant']['foto_dir'].'/'.$restaurant['Restaurant']['foto'],
					array(
						'class' => 'rounded img-view'
						)
					); 
				?>
		</div>

		<div class="col-md-2">
		<h3>Horario</h3>
			<small>
				<p>Lunes: <?php echo date("H:i", strtotime($restaurant['Restaurant']['monday_open'])) ?> - <?php echo date("H:i", strtotime($restaurant['Restaurant']['monday_close'])) ?></p>
				<p>Martes: <?php echo date("H:i", strtotime($restaurant['Restaurant']['tuesday_open'])) ?> - <?php echo date("H:i", strtotime($restaurant['Restaurant']['tuesday_close'])) ?></p>
				<p>Miércoles: <?php echo date("H:i", strtotime($restaurant['Restaurant']['wednesday_open'])) ?> - <?php echo date("H:i", strtotime($restaurant['Restaurant']['wednesday_close']))	 ?></p>
				<p>Jueves: <?php echo date("H:i", strtotime($restaurant['Restaurant']['thursday_open'])) ?> - <?php echo date("H:i", strtotime($restaurant['Restaurant']['thursday_close'])) ?></p>
				<p>Viernes: <?php echo date("H:i", strtotime($restaurant['Restaurant']['friday_open'])) ?> - <?php echo date("H:i", strtotime($restaurant['Restaurant']['friday_close'])) ?></p>
				<p>Sábado: <?php echo date("H:i", strtotime($restaurant['Restaurant']['saturday_open'])) ?> - <?php echo date("H:i", strtotime($restaurant['Restaurant']['saturday_close'])) ?></p>
				<p>Domingo: <?php echo date("H:i", strtotime($restaurant['Restaurant']['sunday_open'])) ?> - <?php echo date("H:i", strtotime($restaurant['Restaurant']['sunday_close'])) ?></p>
			</small>
		</div>
	</div>
	
</div>

<hr>

<div class="row">
<div id="container-reviews" class="col">
<h2>Opiniones</h2>
<div id="add-review" class="add-review">
<?php 
if(isset($current_user)){
	echo $this->Html->link('Añadir comentario', 
                                        array(
                                            'controller'=>'reviews',
                                            'action' => 'add'
                                      ),
                                          array(
                                            'class' => 'btn btn-warning',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#exampleModal'
                                          )
                                        ); 
}
                
		  ?>
</div>
<?php if (!empty($reviews)): ?>

	<div id="reviews" class="row">
			
			<?php foreach($reviews as $review){ ?>
			<div class="row col-md-8 review">
				<div class="col-md-2 text-center">
					<?php
					echo $this->Html->image(
						'../files/user/foto/'.$review['User']['foto_dir'].'/'.$review['User']['foto'],
						array(
							'class' => 'img-user'
							)
						);
						?>
						<p><?php echo $review['Review']['username'];?></p>
						<p><?php echo $review['Review']['user_reviews'];?> opiniones</p>
				</div>
				
				
			
				<div class="col-md-2">
					
					<small>General</small>
					<p class="clasificacion">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
											'legend' => false, 
											'disabled' => 'disabled',
											'value' => round($review['Review']['general_rate'])
										);
							echo $this->Form->radio('general_rate'.$review['Review']['id'], $options, $attributes);
						?>
					</p>
					<small>Conocimiento	</small>
					<p class="clasificacion">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
											'legend' => false, 
											'disabled' => 'disabled',
											'value' => round($review['Review']['gluten_knowledge'])
										);
							echo $this->Form->radio('gluten_knowledge'.$review['Review']['id'], $options, $attributes);
						?>
					</p>
					<small>Adaptación</small>
					<p class="clasificacion">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
											'legend' => false, 
											'disabled' => 'disabled',
											'value' => round($review['Review']['gluten_adaptation'])
										);
							echo $this->Form->radio('gluten_adaptation'.$review['Review']['id'], $options, $attributes);
						?>
					</p>
				</div>
				<div class="col-md-8">
					<?php

					if(isset($current_user) && $current_user['id'] == $review['Review']['user_id']){


						echo $this->Form->postLink('<span><i class="fas fa-trash"></i></span>', 
									array(
										'controller' => 'reviews', 
									'action' => 'delete',
										$review['Review']['id'],
										$restaurant['Restaurant']['id'] ),
										array(
											'escape'=> false
										),
									array('confirm' => '¿Estás seguro que quieres elissminar el usuario?',
										)
									);
					}
					?>
					<?php
						echo '<small>'.date("d/m/Y", strtotime($review['Review']['date'])).'</small>';
						echo '<p>'.$review['Review']['review'].'<p>';
					?>
				</div>
			</div>
			<?php } ?>
				
			<div class="paging row">
				<?php
				if(isset($this->Paginator)){
						if($numbers){
							?>
							<ul class="pagination">
								<?php echo $this->Paginator->first(__('<<'), array('tag' => 'li'));?>
								<?php echo $this->Paginator->prev(__('<'), array('tag' => 'li'));?>
								<?php echo $numbers; ?>
								<?php echo $this->Paginator->next(__('>'), array('tag' => 'li')); ?>
								<?php echo $this->Paginator->last(__('>>'), array('tag' => 'li')); ?>
							</ul>
							<?php
						}
					}
						?>
			</div>
	</div>  <!-- fin del row -->
<?php endif; ?> 
	
</div>
</div>
<div id="modal"> 
<?php echo $this->element('modalReview'); ?>
</div>
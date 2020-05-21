<?php
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

<div class="border border-light p-5">
<div class="row">
	<div class="col-md-3">
				<h2 class="mb-4 text-center"><?php echo h($user['User']['username']); ?>
				<?php
				if(isset($current_user) && $current_user['id'] == $user['User']['id']){

					echo $this->Html->link('<span><i class="fas fa-edit"></i></span>', 
					array(
							'action' => 'edit', 
							$user['User']['id']),
					array(
						'escape'=> false
					)
					); 

				}

				?></h2>
		<div class="form-row mb-4  text-center">
			<div class="col">
				<?php 
					echo $this->Html->image(
						'../files/user/foto/'.$user['User']['foto_dir'].'/'.$user['User']['foto'],
						array(
							'class' => 'img-user'
							)
						); 
				?>
			</div>
		</div>
		<div class="form-row mb-4 user-info text-center">
			<div class="col">
				<h4>Nombre</h4>
				<?php echo $user['User']['name']." ".$user['User']['surname']; ?>
			</div>
		</div>
		<div class="form-row mb-4 user-info text-center">
			<div class="col">
				<h4>Email</h4>
				<?php echo h($user['User']['email']); ?>
			</div>
		</div>
		<div class="form-row mb-4 user-info text-center">
			<div class="col">
				<h4>Fecha de registro</h4>
				<?php echo date("d/m/Y", strtotime($user['User']['creation_date']));?>
			</div>
		</div>
		<div class="form-row mb-4 text-center">
			<div class="col">
				<?php echo $this->Form->postLink('Eliminar usuario', 
									array(
										'action' => 'delete', 
										$user['User']['id']),
										array(
											'escape'=> false,
											'class' => 'btn btn-danger'
										),
									array('confirm' => '¿Estás seguro que quieres eliminar el usuario?',
										)
									);
			?>
			</div>
		</div>
	</div> <!-- End col -->

	<div class="col-md-9">
	<h2>Opiniones del usuario:</h2>
	<?php if (!empty($reviews)): ?>

		<div id="container-reviews" class="mb-8">
				
				<?php foreach($reviews as $review){ ?>
				
				<div class="row col-md-12 review">
					<div class="col-md-2 text-center">
						<?php 
						echo $this->Html->image(
							'../files/user/foto/'.$user['User']['foto_dir'].'/'.$user['User']['foto'],
							array(
								'class' => 'img-user'
								)
							); 
							echo $user['User']['username'];
	
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
						echo $this->Html->link($review['Review']['restaurant_name'], 
								array(	
										'controller' => 'restaurants',
										'action' => 'view', 
										$review['Review']['restaurant_id'],
								
								),array('class'=>'h4')
							);?>
							<small><?php echo date("d/m/Y", strtotime($review['Review']['date'])); ?> </small><br>
							<small><?php echo $review['Review']['restaurant_address']; ?></small><br><br>
							<?php echo '<p>'.$review['Review']['review'].'<p>';?>
					</div>
				</div>
				<?php } ?>
					
		
		</div>  <!-- fin del row -->
		<div class="paging">
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
	</div>
	<?php endif; ?> 

	</div> <!-- End col -->

</div> <!-- End row -->
</div> <!-- End border -->

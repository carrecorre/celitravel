<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id');  ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<td><?php 
				echo $this->Html->image(
					'../files/user/foto/'.$user['User']['foto_dir'].'/'.$user['User']['foto'],
					array(
						'class' => 'img-round'
						)
					); 
					?>&nbsp;</td>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
		
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Surname'); ?></dt>
		<dd>
			<?php echo h($user['User']['surname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creation Date'); ?></dt>
		<dd>
			<?php echo h($user['User']['creation_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<h2>Opiniones</h2>
<?php if (!empty($user['Review'])): ?>

	<div id="reviews" class="row">
			
			<?php foreach($user['Review'] as $review){ ?>

			<div class="row col-md-8">
				<div class="col-md-2">
					<?php
						echo 'Opinión de: '.$user['User']['username'];
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

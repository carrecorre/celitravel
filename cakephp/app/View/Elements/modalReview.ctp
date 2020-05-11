
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php echo $this->Form->create('Review', array('class' => 'navbar-form navbar-right', 'id' => 'modal-review')); ?>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <?php echo $this->Form->hidden('restaurant_id', array('value' => $restaurant['Restaurant']['id'])); ?>
              <?php echo $this->Form->hidden('user_id', array('value' => $current_user['id'])); ?>
              <?php echo $this->Form->input('review', array('label' => false, 'class' => 'form-control input_user', 'placeholder' => 'COmentario')); ?>
            </div>
            </p>
					<small>General	</small>
					<p class="clasificacion clasify">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
                      'legend' => false, 
                      'value' => 1
										);
							echo $this->Form->radio('general_rate', $options, $attributes);
						?>
					</p>
					</p>
					<small>Conocimiento	</small>
					<p class="clasificacion clasify">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
                      'legend' => false, 
                      'value' => 1
										);
							echo $this->Form->radio('gluten_knowledge', $options, $attributes);
						?>
					</p>
					</p>
					<small>Adaptacion	</small>
					<p class="clasificacion clasify">
						<?php
							$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
							$attributes = array(
                      'legend' => false, 
                      'value' => 1
										);
							echo $this->Form->radio('gluten_adaptation', $options, $attributes);
						?>
					</p>
            <div class="d-flex justify-content-center mt-3 login_container"> 	
            <?php echo $this->Form->button('Añadir', array('class' => 'btn login_btn')); ?>
				   </div>
           <div id="error_message">
          </div>
      <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>

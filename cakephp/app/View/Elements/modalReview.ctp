
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-review">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tu opinión de <?php echo $restaurant['Restaurant']['name'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php echo $this->Form->create('Review', array('class' => 'navbar-form navbar-right', 'id' => 'modal-review')); ?>

      <div class="col text-center">        
        <small>Conocimiento de la celiaquía</small><br>
        <span class="clasificacion clasify">
            <?php
                $options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
                $attributes = array(
                                'legend' => false, 
                                'value' => 1
                            );
                echo $this->Form->radio('gluten_knowledge', $options, $attributes);
            ?>
        </span>
      </div>
      <div class="col text-center">        
        <small>Adaptación de la carta</small><br>
        <span class="clasificacion clasify">
            <?php
                $options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
                $attributes = array(
                                'legend' => false, 
                                'value' => 1
                            );
                   echo $this->Form->radio('gluten_adaptation', $options, $attributes);
            ?>
        </span>
      </div>
      <div class="col text-center">        
        <small>General</small><br>
        <span class="clasificacion clasify">
            <?php
                $options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
                $attributes = array(
                                'legend' => false, 
                                'value' => 1
                            );
                echo $this->Form->radio('general_rate', $options, $attributes);
            ?>
        </span>
      </div>
				
            <div class="input-group">
              <?php echo $this->Form->hidden('restaurant_id', array('value' => $restaurant['Restaurant']['id'])); ?>
              <?php echo $this->Form->hidden('user_id', array('value' => $current_user['id'])); ?>
              <?php echo $this->Form->input('review', array('label' => false, 
                                                            'class' => 'form-control', 
                                                            'placeholder' => '¿Qué te ha parecido?', 
                                                            'div' =>array(
                                                              'class'=>'col text-center
                                                              ')
                                                            )
                                                        ); ?>
            </div>

				
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

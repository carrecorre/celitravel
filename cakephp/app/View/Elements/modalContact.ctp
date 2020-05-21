
<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-review">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacta con nosotros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php echo $this->Form->create('Review', array('class' => 'navbar-form navbar-right', 'id' => 'modal-review')); ?>

      <div class="col">        
            <?php echo $this->Form->input('email', array('label' => 'Email', 
                                                            'class' => 'form-control', 
                                                            'placeholder' => 'Déjanos tu email para poder contactar contigo', 
                                                            
                                                            )
                                                        ); ?>
       
      </div>
      <div class="col">        
      <?php echo $this->Form->input('subject', array('label' => 'Concepto', 
                                                            'class' => 'form-control', 
                                                            'placeholder' => '¿Sobre qué es tu consulta?', 
                                                            
                                                            )
                                                        ); ?>
        
      </div>
      
				<hr>
            <div class="input-group">
             <?php echo $this->Form->input('review', array('label' => 'Comentario', 
                                                            'class' => 'form-control', 
                                                            'placeholder' => 'Cuéntanos tu vida', 
                                                            'div' =>array(
                                                              'class'=>'col text-center
                                                              ')
                                                            )
                                                        ); ?>
            </div>

            <hr>
            <div class="d-flex justify-content-center mt-3 login_container"> 	
            <?php echo $this->Form->button('Enviar', array('class' => 'btn login_btn')); ?>
				   </div>
           <div id="error_message">
          </div>
      <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>

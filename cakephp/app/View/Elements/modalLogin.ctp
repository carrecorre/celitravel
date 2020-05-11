
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
          <?php 
              echo $this->Html->image(
                '../img/celitravel-logo.png',
                array(
                  'class' => 'brand_logo',
                  'alt' => 'Logo'
                  )
                ); 
          ?>	
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
        <?php echo $this->Form->create('User', array('class' => 'navbar-form navbar-right', 'id' => 'modal-login')); ?>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control input_user', 'placeholder' => 'Usuario')); ?>
            </div>
            <div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
              <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control input_pass', 'placeholder' => 'Contraseña')); ?>
            </div>
            <div class="d-flex justify-content-center mt-3 login_container"> 	
            <?php echo $this->Form->button('Acceder', array('class' => 'btn login_btn')); ?>
				   </div>
           <div id="error_message">
        </div>
      <?php echo $this->Form->end(); ?>
      </div>
      <div id="error_message">
      </div>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
           <?php echo $this->Html->link(' ¿No tienes cuenta?  Regístrate', 
                                array(
                                      'controller' => 'users', 
                                      'action' => 'add')) 
                                      ?>
					</div>
				</div>
			</div>
		</div>
    </div>
  </div>
</div>
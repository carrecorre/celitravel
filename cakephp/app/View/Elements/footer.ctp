<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5>Acerca de</h5>
        <p>Proyecto del ciclo de Desarrollo de Aplicaciones Web<br>CIFP Juan de Colonia (Burgos).</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5>Explorar</h5>

        <ul class="list-unstyled">
          <li>
          <?php echo $this->Html->link(' ¿No tienes cuenta?  Regístrate', 
                                array(
                                      'controller' => 'users', 
                                      'action' => 'add')) 
                                      ?>
          </li>
          <li>
             <?php
                echo $this->Html->link('Contacta con nosotros', 
                array(
                   
                    'action' => '#'
                 ),
                  array(
                    'data-toggle' => 'modal',
                    'data-target' => '#modalContact'
                  )
                ); 

            ?>
          </li>


        </ul>

      </div>
      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            

            <ul class="list-unstyled">

            <li>
                    <?php 
                    echo $this->Html->image(
                                '../img/logotipo.png',
                                array(
                                    'class' => 'menu-logo'
                                )
                        );       
                    ?>
                </li> 
            <li>
                <a type="button" class="btn-floating btn-fb btn-sm">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a type="button" class="btn-floating btn-tw btn-sm">
                    <i class="fab fa-twitter"></i>
                </a>
                <a type="button" class="btn-floating btn-li btn-sm">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a type="button" class="btn-floating btn-git btn-sm">
                    <i class="fab fa-github"></i>
                </a>
            </li> 
            </ul>

            </div>

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
  © 2020 Copyright: Ángel Carretón
  </div>
  <!-- Copyright -->

</footer>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <?php 
  echo $this->Html->image(
              '../img/celitravel-logo.png',
              array(
                'class' => 'menu-logo',
              'url' => array(
                    'controller'=>'pages',
                    'action' => 'home'
                    )
            )
    );
                
        ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-link">
      <?php 
                echo $this->Html->link('Restaurantes', 
                                        array('controller'=>'restaurants',
                                            'action' => 'index'
                                            )
                                        ); 
            ?>
      </li>
      <li class="nav-link">
      <?php 
                echo $this->Html->link('Usuarios', 
                                        array('controller'=>'users',
                                            'action' => 'index'
                                            )
                                        ); 
            ?>
      </li>
      
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
    <?php 
                echo $this->Html->link('Log in', 
                                        array('controller'=>'restaurants',
                                            'action' => 'index'
                                      ),
                                          array(
                                            'class' => 'btn btn-outline-success my-2 my-sm-0'
                                          )
                                        ); 
            ?>
        <ul class='navbar-nav mr-left' >
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">Mi cuenta</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Mis datos</a>
          <a class="dropdown-item" href="#">Log out</a>
        </div>
      </li>
        </ul>
  </div>
</nav>
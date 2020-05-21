
<nav class="navbar navbar-expand-md fixed-top" id='menu-nav'>
  <?php 
  echo $this->Html->image(
              '../img/logotipo.png',
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
  
    <ul class="navbar-nav mr-auto mx-auto">
    <?php if(isset($current_user) && $current_user['role'] == 'admin'): ?>
      <li class="nav-item dropdown ">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Restaurantes <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li  class="dropdown-item"><?php echo $this->Html->link('Lista restaurantes', array('controller' => 'restaurants', 'action' => 'index')) ?></li>
                <li  class="dropdown-item"><?php echo $this->Html->link('Nuevo restaurante', array('controller' => 'restaurants', 'action' => 'add')) ?></li>
              </ul>
            </li>
            
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li  class="dropdown-item"><?php echo $this->Html->link('Lista Usuarios', array('controller' => 'users', 'action' => 'index')) ?></li>
                <li  class="dropdown-item"><?php echo $this->Html->link('Nuevo Usuario', array('controller' => 'users', 'action' => 'add')) ?></li>
              </ul>
            </li>
      
    <?php endif; ?>
    </ul>
    <?php if(!isset($current_user)): ?>
     
      <div class='navbar-nav mr-left' >
        <?php 
                echo $this->Html->link('Iniciar sesión', 
                                        array(
                                            'controller'=>'restaurants',
                                            'action' => 'index'
                                      ),
                                          array(
                                            'class' => 'btn btn-outline-warning my-2 my-sm-0',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#exampleModalCenter'
                                          )
                                        ); 
          ?>
            
      </div>
    <?php else: ?>
        <ul class='navbar-nav mr-left'>
        <?php 
				echo $this->Html->image(
					'../files/user/foto/'.$current_user['foto_dir'].'/'.$current_user['foto'],
					array(
						'class' => 'img-menu'
						)
					); 
					?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><?php echo $current_user['username'] ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
       
        <?php 
                echo $this->Html->link('Mis datos', 
                                        array(
                                            'controller'=>'users',
                                            'action' => 'view',
                                            $current_user['id']
                                      ),
                                          array(
                                            'class' => 'dropdown-item'
                                          )
                                        ); 
            ?>
          <?php 
                echo $this->Html->link('Log out', 
                                        array(
                                            'controller'=>'users',
                                            'action' => 'logout'
                                      ),
                                          array(
                                            'class' => 'dropdown-item'
                                          )
                                        ); 
            ?>
        </div>
      </li>
        </ul>
        <?php endif; ?>
  </div>

</nav>
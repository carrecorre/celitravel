<div class="jumbotron">
    <div class="container">
      <h1 class="display-3">CeliTravel</h1>
      <p>El buscador de restaurantes para gente con intolerancia al gluten</p>
    </div>
  </div>
  
  <div class="row">
  <div class="col-md-6 ">
  <?php
        echo $this->Form->create('Restaurant', array(
                                                'type' => 'GET',
                                                'class' => 'my-2 my-lg-0',
                                                'id' => 'form-search',
                                                'url' => array(
                                                    'controller' => 'restaurants',
                                                    'action' => 'search'
                                                    )
                                                  )
                                                );
    ?>
  <div class="form-group">

    <?php
        echo $this->Form->input('search', array(
                                            'label' => false,
                                            'div' => false,
                                            'id' => 'input-search',
                                            'class' => 'form-control mr-sm-2',
                                            'autocomplete' => 'off',
                                            'placeholder' => 'CeliTravel te lo busca'
                                             )
                                          );
      ?>
</div>
      <?php  
        echo $this->Form->button('Buscar', array(
                                            'div' => false,
                                            'class' => 'btn btn-outline-success my-2 my-sm-0'
                                             )
                                          );     
                                          
        echo $this->Form->end();

      ?>
    
  </div>
  </div>
  
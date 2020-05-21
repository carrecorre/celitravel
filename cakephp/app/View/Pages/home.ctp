    
     <div class="d-flex justify-content-center h-100 search">
        <?php
            echo $this->Form->create('Restaurant', array(
                                                    'type' => 'GET',
                                                    'class' => '',
                                                    'id' => 'form-search',
                                                    'url' => array(
                                                        'controller' => 'restaurants',
                                                        'action' => 'search'
                                                        )
                                                        )
                                                    );
        ?>
            <div class="row">
                <div class="searchbar  col-md-11">
                <span  class="separator"><i class="fas fa-utensils"></i></span>
                    <?php
                        echo $this->Form->input('search', array(
                                                            'label' => false,
                                                            'div' => false,
                                                            'id' => 'input-search',
                                                            'class' => 'search_input  input-restaurant col-md-5',
                                                            'autocomplete' => 'off',
                                                            'placeholder' => 'CeliTravel te lo busca'
                                                            )
                                                            );
                    ?>
                    <span class="separator"><i class="fas fa-map-marker-alt"></i></span>
                    <?php
                        echo $this->Form->input('search-town', array(
                                                            'label' => false,
                                                            'div' => false,
                                                            'id' => 'input-search-town',
                                                            'class' => 'search_input input-town col-md-5 right',
                                                            'autocomplete' => 'off',
                                                            'placeholder' => '¿Adónde quieres ir?'
                                                            )
                                                            );
                    ?>

                    <?php
                        foreach($specialties as $key => $specialty){
                                echo $this->Form->hidden(
                                    $key,
                                    array(
                                        'label' => ($specialty),
                                        'class' => 'specialty',
                                        'type' => 'checkbox',
                                        'checked' => 'checked'
                                    )
                                ); 
                                        
                        }
                    ?>
                    <?php  
                        echo $this->Form->button('', array(
                                                            'div' => false,
                                                            'class' => 'search_icon col-md-2'
                                                                )
                                                            );                    
                    ?>   
                </div>
            </div>
         
         <?php
          echo $this->Form->end();
          ?>   
    </div>


<hr>

<div class="container carousel-container">
<h3>Recomendaciones para ti</h3>
 
  <div class="col-sm-11 mx-auto">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php 
          foreach ($restaurants as $key => $restaurant){?>
        
    <li data-target="#carouselExampleIndicators" data-slide-to=<?php echo $key ?> <?php if($key == 0){ echo 'class="active"';} ?> ></li>
          <?php } ?>
  </ol>
  <div class="carousel-inner">
 <?php foreach ($restaurants as $key => $restaurant){?>
    <div class="carousel-item <?php if($key == 0){ echo 'active';} ?>">
    <?php 
				echo $this->Html->image(
					'../files/restaurant/foto/'.$restaurant['Restaurant']['foto_dir'].'/'.$restaurant['Restaurant']['foto'],
					array(
                        'class' => 'd-block w-100',
                        'alt' => 'slide'
						)
					); 
					?>
  <div class="carousel-caption d-none d-md-block">
    <h5>
    <?php 
                echo $this->Html->link($restaurant['Restaurant']['name'], 
                                        array(
                                            'controller'=>'restaurants',
                                            'action' => 'view',
                                            $restaurant['Restaurant']['id']
                                      )
                                        ); 
          ?>
        <span class="clasificacion">
				<?php
					$options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
					$attributes = array(
									'legend' => false, 
									'disabled' => 'disabled',
									'value' => round($restaurant['Restaurant']['gluten_knowledge'])
								);
          echo $this->Form->radio($restaurant['Restaurant']['name'], $options, $attributes,
                                  array(
                                    'class' => 'form-star'
                                  ));
				?>
			</span>
      </h5>
      
      <p>
      
			<?php echo $restaurant['Restaurant']['address']; ?> -
			<?php echo $restaurant['Restaurant']['town'].','; ?>	
			<?php echo $restaurant['Restaurant']['postal_code'].','; ?>
			<?php echo $restaurant['Province']['name']; ?>
		<p>
  </div>
</div>
<?php } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>

</div>

<hr>
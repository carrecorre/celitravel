<?php
echo $this->Html->css(Configure::read('MAPS_API_CSS'));
echo $this->Html->script(Configure::read('MAPS_API_JS'));
echo $this->Html->script('map-search');
?>
<div class="row">
<div class="d-flex justify-content-center h-100 search col-md-11">
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
        <div class="searchbar ">
            <?php
                echo $this->Form->input('search', array(
                                                    'label' => false,
                                                    'div' => false,
                                                    'id' => 'input-search',
                                                    'class' => 'search_input  input-restaurant col-md-5',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => 'CeliTravel te lo busca',
                                                    'value' => $_GET['search']
                                                    )
                                                );
            ?>
            <span class="separator">||</span>
            <?php
                echo $this->Form->input('search-town', array(
                                                    'label' => false,
                                                    'div' => false,
                                                    'id' => 'input-search-town',
                                                    'class' => 'search_input input-town col-md-5 right',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => 'CeliTravel te lo busca',
                                                    'value' => $_GET['search-town']
                                                    )
                                                );
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
    <div class="row">
        <?php
            foreach($specialties as $key => $specialty){

                if(isset($_GET[$key])){
                    echo $this->Form->input(
                    $key,
                    array(
                        'label' => ($specialty),
                        'class' => 'specialty',
                        'type' => 'checkbox',
                        'checked' => $_GET[$key]
                    )
                ); 
                }else{
                    echo $this->Form->input(
                        $key,
                        array(
                            'label' => ($specialty),
                            'class' => 'specialty',
                            'type' => 'checkbox',
                            
                        )
                    ); 
                }              
            }
        ?>
    </div>
    <?php
        echo $this->Form->end();
    ?>   
</div> <!-- Fin formulario -->
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php if(!empty($restaurants)): ?>
                
                <h2>Restaurantes</h2>

                    <?php foreach($restaurants as $restaurant): ;?>
                        
                        <div class="restaurant-list row">
                            <div>
                            <figure class="restaurant">
                                <?php echo $this->Html->image('../files/restaurant/foto/' . $restaurant['Restaurant']['foto_dir'] . '/' . $restaurant['Restaurant']['foto'], 
                                                    
                                                        array(
                                                            'class' => 'img-square',
                                                            'url' => array('controller' => 'restaurants', 
                                                                            'action' => 'view', 
                                                                            $restaurant['Restaurant']['id'])
                                                                            )
                                                                        ); ?>
                            </figure>
                            </div>
                            <div>
                            <?php echo $this->Html->link($restaurant['Restaurant']['name'], array('action' => 'view', $restaurant['Restaurant']['id'])); ?>
                            <p><?php echo count($restaurant['Review']) ?> opiniones</p>
                            
                            <div>        
                                <label>Gluten: </label>
                                <span class="clasificacion">
                                    <?php
                                        $options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
                                        $attributes = array(
                                                        'legend' => false, 
                                                        'disabled' => 'disabled',
                                                        'value' => round($restaurant['Restaurant']['gluten_knowledge'])
                                                    );
                                        echo $this->Form->radio($restaurant['Restaurant']['name'].'gluten', $options, $attributes,
                                                                    array(
                                                                        'class' => 'form-star'
                                                                    )
                                                                );
                                    ?>
                                </span>
                            </div>
                            <div>
                                <label>General: </label>
                                <span class="clasificacion">
                                    <?php
                                        $options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
                                        $attributes = array(
                                                        'legend' => false, 
                                                        'disabled' => 'disabled',
                                                        'value' => round($restaurant['Restaurant']['general_rate'])
                                                    );
                                        echo $this->Form->radio($restaurant['Restaurant']['name'].'general', $options, $attributes,
                                                                array(
                                                                    'class' => 'form-star'
                                                                )
                                                            );
                                    ?>
                                </span>
                            </div>
                            <p>
                                <?php echo $restaurant['Restaurant']['address']; ?> -
                                <?php echo $restaurant['Restaurant']['town'].','; ?>	
                                <?php echo $restaurant['Restaurant']['postal_code'].','; ?>
                                <?php echo $restaurant['Province']['name']; ?>
                                <?php echo '('.$restaurant['Province']['community'].')'; ?>
                            </p>
                            <p>A <?php echo round($restaurant['Restaurant']['user_distance'],1); ?> Km de ti</p>
                            </div>                        
                        </div>
                    <?php endforeach; ?>                                                      
    
            <?php else: ?>
                <h3>Lo sentimos, no hemos podido encontrar "<?php echo($_GET['search']); ?>" en todo el mundo</h3>
            <?php endif; ?> <!-- fin de  if restaurants --> 
        </div> <!-- fin de la columna --> 

        <?php if(!empty($restaurants)): ?>
        <div class=" col-md-4">
            <div id="myMap" class="map-view"></div>
        </div>
        <?php endif; ?> <!-- fin de  if restaurants --> 
    </div> <!-- fin de  row --> 
</div> <!-- fin de container --> 
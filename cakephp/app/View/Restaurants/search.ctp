<?php
if(isset($this->Paginator)){
$this->Paginator->options(array(
		'update' => '#container-restaurants',
		
    ));
    
$current = $this->Paginator->counter(
    array(
        'format' => '{:page}'
    )
);

$numbers = $this->Paginator->numbers(
    array(
        'separator' => '',
        'tag' => 'li'
    )
);
}
?>

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
        <span  class="separator"><i class="fas fa-utensils"></i></span>
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
            <span class="separator"><i class="fas fa-map-marker-alt"></i></span>
            <?php
                echo $this->Form->input('search-town', array(
                                                    'label' => false,
                                                    'div' => false,
                                                    'id' => 'input-search-town',
                                                    'class' => 'search_input input-town col-md-5 right',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => '¿Adónde quieres ir?',
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
        <div class="col specialties-check">
        <?php
            foreach($specialties as $key => $specialty){

                if(isset($_GET[$key])){
                    echo $this->Form->input(
                    $key,
                    array(
                        'label' => ($specialty),
                        'class' => 'specialty',
                        'type' => 'checkbox',
                        'checked' => $_GET[$key],
                        'div' => array('class' => 'form-check ')

                    )
                ); 
                }else{
                    echo $this->Form->input(
                        $key,
                        array(
                            'label' => ($specialty),
                            'class' => 'specialty',
                            'type' => 'checkbox',
                            'div' => array('class' => 'form-check')
                            
                        )
                    ); 
                }              
            }
        ?>
        </div>
    </div>
    <?php
        echo $this->Form->end();
    ?>   
</div> <!-- Fin formulario -->
</div>
<div>
<div class="row ">
    <div class="col query text-center">
<?php if($this->request->query['search'] != ''){ ?>
        <h2>
            Mostrando resultados de  "<?php echo ($this->request->query['search']) ?>"
            <?php   if($this->request->query['search-town'] != ''){

                  echo 'en '.($this->request->query['search-town']);
                }?>
    
    </h2>
    <?php }else if($this->request->query['search-town'] != ''){ ?>
        <h2>Los mejores restaurantes de <b><?php echo ($this->request->query['search-town']) ?></b></h2>
    <?php }else{ ?>
         <h2> Los mejores restaurantes sin gluten</h2>
    <?php } ?> 
    </div>
</div>
<div class ="restaurants-search">
    
    <div class="row" id="container-restaurants">
        <div class="col-md-7">
            <?php if(!empty($restaurants)): ?>
                
               
                    <?php foreach($restaurants as $restaurant): ;?>
                        
                        <div class="restaurant-list row col-12">
                            <div class="col-8 row nopadding rate-container">
                                <div class="col-12 text-center">
                            <h3><?php echo $this->Html->link($restaurant['Restaurant']['name'], array('action' => 'view', $restaurant['Restaurant']['id'])); ?></h3>
                            <p><?php echo count($restaurant['Review']) ?> opiniones</p>
                            </div>
                            <div class="col text-center rate">        
                                <small>Conocimiento de la celiaquía</small><br>
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
                            <div class="col text-center rate">        
                                
                                <small>Adaptación de la carta</small><br>
                                <span class="clasificacion">
                                    <?php
                                        $options = array('5' => '★', '4' => '★','3' => '★','2' => '★','1' => '★');
                                        $attributes = array(
                                                        'legend' => false, 
                                                        'disabled' => 'disabled',
                                                        'value' => round($restaurant['Restaurant']['gluten_adaptation'])
                                                    );
                                        echo $this->Form->radio($restaurant['Restaurant']['name'].'adaptation', $options, $attributes,
                                                                    array(
                                                                        'class' => 'form-star'
                                                                    )
                                                                );
                                    ?>
                                </span>
                            </div>
                            <div class="col text-center rate"> 
                                <small>Puntuación general</small><br>
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
                            </div><!--  end col -->
                            <div class="col text-center">
                            
                                <div>

                                <?php echo $this->Html->image('../files/restaurant/foto/' . $restaurant['Restaurant']['foto_dir'] . '/' . $restaurant['Restaurant']['foto'],                                  
                                                        array(
                                                            'class' => 'img-search rounded',
                                                            'url' => array('controller' => 'restaurants', 
                                                                            'action' => 'view', 
                                                                            $restaurant['Restaurant']['id'])
                                                                            )
                                                                        ); ?>
                                </div>
                            
                                <div>

                                <small>
                                    <?php echo $restaurant['Restaurant']['address']; ?> -
                                    <?php echo $restaurant['Restaurant']['town'].','; ?>	
                                    <?php echo $restaurant['Restaurant']['postal_code'].','; ?>
                                    <?php echo $restaurant['Province']['name']; ?>
                                    <?php echo '('.$restaurant['Province']['community'].')'; ?>
                                </small>
                                
                                <p>A <?php echo round($restaurant['Restaurant']['user_distance'],1); ?> Km de ti</p>                
                               
                                                                        
                                </div>
                            
                            </div>                        
                        </div> <!-- end restaurant-list -->
                    <?php endforeach; ?>                                                      
    
            <?php else: ?>
                <h3>Lo sentimos, no hemos podido encontrar "<?php echo($_GET['search']); ?>" en todo el mundo</h3>
            <?php endif; ?> <!-- fin de  if restaurants --> 
        </div> <!-- fin de la columna --> 
        <?php if(!empty($restaurants)): ?>
        <div class=" col-md-4">
            <div id="myMap" class="map-view text-center"></div>
        </div>
        <?php endif; ?> <!-- fin de  if restaurants --> 

    </div> <!-- fin de  row --> 
    <div class="paging">
        <?php
        if(isset($this->Paginator)){
            if($numbers){
                ?>
                <ul class="pagination ">
                    <?php echo $this->Paginator->first(__('<<'), array('tag' => 'li'));?>
                    <?php echo $this->Paginator->prev(__('<'), array('tag' => 'li'));?>
                    <?php echo $numbers; ?>
                    <?php echo $this->Paginator->next(__('>'), array('tag' => 'li')); ?>
                    <?php echo $this->Paginator->last(__('>>'), array('tag' => 'li')); ?>
                </ul>
                <?php
                    }
                }
                ?>
	</div>
</div> <!-- fin de container --> 
<div>
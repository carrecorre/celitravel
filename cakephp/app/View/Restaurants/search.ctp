<?php if($ajax !=1): ?>

<h1>Buscar</h1>
<br>
<div class="row">
<?php
        echo $this->Form->create('Restaurant', array(
                                                'type' => 'GET',
                                                'id' => 'form-search',
                                                'class' => 'row',
                                                'url' => array(
                                                    'controller' => 'restaurants',
                                                    'action' => 'search'
                                                    )
                                                  )
                                                );
    ?>


<div class="col-sm-6">
<?php
    echo $this->Form->input('search', array(
                                        'label' => false,
                                        'div' => false,
                                        'id' => 'input-search',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'value' => $search,
                                        'placeholder' => 'CeliTravel te lo busca'
                                         )
                                      );
  ?>
</div>
<div class="col-sm-3">
<?php  
        echo $this->Form->button('Buscar', array(
                                            'div' => false,
                                            'class' => 'btn btn-outline-success my-2 my-sm-0'
                                             )
                                          );     
                                          
        echo $this->Form->end();

      ?>
</div>
<?php  echo $this->Form->end(); ?>
</div>
<?php endif; ?>

<?php if(!empty($search)): ?>


    <?php if(!empty($towns)): ?>

 <div class='row'>
<?php
foreach($towns as $key => $town): ?>
            <div class="col-sm-8">
               
               <?php
               echo $town['Restaurant']['town']; ?>
            </div>
        <?php endforeach; ?>

</div>


<?php endif; ?>

<?php if(!empty($restaurants)): ?>
  

<div class='row'>
<?php
foreach($restaurants as $restaurant): ?>
            <div class="col-sm-3">
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
                <?php echo $this->Html->link($restaurant['Restaurant']['name'], array('action' => 'view', $restaurant['Restaurant']['id'])); ?>

            </div>
        <?php endforeach; ?>

</div>

<?php else: ?>

<h3>NO se ha nencotnrado resutaldos</h3>


<?php endif; ?>
<?php endif; ?>
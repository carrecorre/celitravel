<?php
echo $this->Html->css(Configure::read('MAPS_API_CSS'));
echo $this->Html->script(Configure::read('MAPS_API_JS'));
echo $this->Html->script('map');
?>

<div class="col-md-12">
<?php echo $this->Form->create('Restaurant'); ?>
	<fieldset>
		<legend><?php echo __('Add Restaurant'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('postal_code');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('web');
		echo $this->Form->input('province_id');
		echo $this->Form->input('town');
		echo $this->Form->input('monday_open');
		echo $this->Form->input('monday_close');
		echo $this->Form->input('tuesday_open');
		echo $this->Form->input('tuesday_close');
		echo $this->Form->input('wednesday_open');
		echo $this->Form->input('wednesday_close');
		echo $this->Form->input('thursday_open');
		echo $this->Form->input('thursday_close');
		echo $this->Form->input('friday_open');
		echo $this->Form->input('friday_close');
		echo $this->Form->input('saturday_open');
		echo $this->Form->input('saturday_close');
		echo $this->Form->input('sunday_open');
		echo $this->Form->input('sunday_close');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>



<div id="myMap" style = "height: 500px"></div>
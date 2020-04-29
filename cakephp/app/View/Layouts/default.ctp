<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
		
	<title>
		CeliTravel <?php if(isset($restaurant)){
				echo ' | '.$restaurant['Restaurant']['name'];
		};
			?>
	</title>
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.min','bootstrap-grid.min','jumbotron','style.css','jquery-ui.min'));
		echo $this->Html->script(array('jquery','bootstrap.min','bootstrap.bundle.min','jquery-ui.min','search'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
		//$("#foto").fileinput();
		
		var basePath = "<?php echo Router::url('/'); ?>"
	</script>
</head>
<body>

<?php echo $this->element('menu'); ?>

<main role="main">



  <?php echo $this->Flash->render(); ?>

<?php echo $this->fetch('content'); ?>

</main>

<footer class="container">
  <p>&copy; Company 2017-2019</p>
</footer>
</body>
</html>

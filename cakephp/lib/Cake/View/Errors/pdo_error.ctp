<!-- <?php
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
 * @package       Cake.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<h2><?php echo __d('cake_dev', 'Database Error'); ?></h2>
<p class="error">
	<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
	<?php echo $message; ?>
</p>
<?php if (!empty($error->queryString)) : ?>
	<p class="notice">
		<strong><?php echo __d('cake_dev', 'SQL Query'); ?>: </strong>
		<?php echo h($error->queryString); ?>
	</p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
		<strong><?php echo __d('cake_dev', 'SQL Query Params'); ?>: </strong>
		<?php echo Debugger::dump($error->params); ?>
<?php endif; ?>
<p class="notice">
	<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
	<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'pdo_error.ctp'); ?>
</p>
<?php
echo $this->element('exception_stack_trace');
?> -->


<div class ="error text-center">
    <?php 
        echo $this->Html->image(
            '../img/logotipo.png'
            ); 
	?>
	
	<h3>¡Vaya! Parece que no tenemos lo que buscas, prueba en otro sitio.</h3>
		</div>
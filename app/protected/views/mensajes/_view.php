<?php
/* @var $this MensajesController */
/* @var $data Mensajes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitud')); ?>:</b>
	<?php echo CHtml::encode($data->longitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitud')); ?>:</b>
	<?php echo CHtml::encode($data->latitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('velocidad')); ?>:</b>
	<?php echo CHtml::encode($data->velocidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rumbo')); ?>:</b>
	<?php echo CHtml::encode($data->rumbo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('panico')); ?>:</b>
	<?php echo CHtml::encode($data->panico); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('placa')); ?>:</b>
	<?php echo CHtml::encode($data->placa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coordinate_id')); ?>:</b>
	<?php echo CHtml::encode($data->coordinate_id); ?>
	<br />

	*/ ?>

</div>
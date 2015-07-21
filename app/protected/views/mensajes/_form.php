<?php
/* @var $this MensajesController */
/* @var $model Mensajes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mensajes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'longitud'); ?>
		<?php echo $form->textField($model,'longitud',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'longitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitud'); ?>
		<?php echo $form->textField($model,'latitud',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'latitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'velocidad'); ?>
		<?php echo $form->textField($model,'velocidad'); ?>
		<?php echo $form->error($model,'velocidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rumbo'); ?>
		<?php echo $form->textField($model,'rumbo'); ?>
		<?php echo $form->error($model,'rumbo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'panico'); ?>
		<?php echo $form->textField($model,'panico',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'panico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'placa'); ?>
		<?php echo $form->textField($model,'placa',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'placa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coordinate_id'); ?>
		<?php echo $form->textField($model,'coordinate_id'); ?>
		<?php echo $form->error($model,'coordinate_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
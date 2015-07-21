<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<h6><small>No Cambiar valor si desea que la contraseña sea la misma</small></h6>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<button class="btn waves-effect waves-light" type="submit" name="action"><?php echo $model->isNewRecord ? 'Crear' : 'Actualizar'; ?></button>
		<a class="btn grey darken-1" href="<?php echo Yii::app()->request->baseUrl; ?>/panel">Cancelar</a>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user'); ?>
		<?php echo $form->textField($model,'user',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">

	  <button class="btn waves-effect waves-light" type="submit" name="action"><?php echo $model->isNewRecord ? 'Crear' : 'Actualizar'; ?>
	    
	  </button>
	  <a class="btn grey darken-1" href="<?php echo Yii::app()->request->baseUrl; ?>/usuarios">Cancelar</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
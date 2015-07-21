<?php
/* @var $this MensajesController */
/* @var $model Mensajes */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mensajes', 'url'=>array('index')),
	array('label'=>'Manage Mensajes', 'url'=>array('admin')),
);
?>

<h1>Create Mensajes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
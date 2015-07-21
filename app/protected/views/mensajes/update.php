<?php
/* @var $this MensajesController */
/* @var $model Mensajes */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mensajes', 'url'=>array('index')),
	array('label'=>'Create Mensajes', 'url'=>array('create')),
	array('label'=>'View Mensajes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Mensajes', 'url'=>array('admin')),
);
?>

<h1>Update Mensajes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
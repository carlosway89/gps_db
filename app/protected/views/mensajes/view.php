<?php
/* @var $this MensajesController */
/* @var $model Mensajes */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mensajes', 'url'=>array('index')),
	array('label'=>'Create Mensajes', 'url'=>array('create')),
	array('label'=>'Update Mensajes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mensajes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mensajes', 'url'=>array('admin')),
);
?>

<h1>View Mensajes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'longitud',
		'latitud',
		'velocidad',
		'rumbo',
		'fecha',
		'panico',
		'placa',
		'coordinate_id',
	),
)); ?>

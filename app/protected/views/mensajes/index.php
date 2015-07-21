<?php
/* @var $this MensajesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mensajes',
);

$this->menu=array(
	array('label'=>'Create Mensajes', 'url'=>array('create')),
	array('label'=>'Manage Mensajes', 'url'=>array('admin')),
);
?>

<h1>Mensajes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

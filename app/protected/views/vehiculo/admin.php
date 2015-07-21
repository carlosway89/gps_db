<?php
/* @var $this VehiculoController */
/* @var $model Vehiculo */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vehiculo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<br>
<!-- <h1>Panel<small> administracion</small></h1> -->
<div class="row">
	<div class="col s12 ">
		<div class="panel">
			<h4 class="center-align"><small>Lista de Vehiculos</small></h4>
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'vehiculo-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'ajaxUrl'=> Yii::app()->request->getUrl(),
				'ajaxUpdate' => TRUE,
				'itemsCssClass' => 'responsive-table striped',
				'pager' => array(
					'header' => '',
			        'hiddenPageCssClass' => 'disabled',
			        'maxButtonCount' => 5,
			        'prevPageLabel' => '<i class="material-icons">chevron_left</i>',
			        'nextPageLabel' => '<i class="material-icons">chevron_right</i>',
			        'firstPageLabel' => 'Primero',
			        'lastPageLabel' => 'Ultimo',
					'htmlOptions'=>array('class'=>'pagination')
					),
				'columns'=>array(
					// 'id',
					'placa',
					'nombre',
					// array(
					// 	'class'=>'CButtonColumn',
					// ),
				),
			)); ?>
		</div>
	</div>
</div>





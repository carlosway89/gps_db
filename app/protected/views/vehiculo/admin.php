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
					array(
						'class'=>'CButtonColumn',
						'template'=>'{single}{filter}',
						'buttons'=>array
					    (
					        'single' => array
					        (
					            'label'=>'<i class="material-icons blue-text">description</i>',
					            // 'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
					            'url'=>'Yii::app()->createUrl("mensajes/admin", array("Mensajes[placa]"=>$data->placa))',
								// 'url'=>'Yii::app()->createUrl("mensajes/admin?")',
					        ),
					        'filter' => array
					        (
					            'label'=>'<i class="material-icons purple-text text-darken-4">settings_remote</i>',
					            'url'=>'Yii::app()->createUrl("panel/index", array("placa"=>$data->placa))',
					        ),
					        // 'down' => array
					        // (
					        //     'label'=>'<i class="material-icons">chevron_left</i>',
					        //     'url'=>'"#"',
					        //     // 'visible'=>'$data->score > 0',
					        //     'click'=>'function(){alert("Going down!");}',
					        // ),
					    ),
					
					),
				),
			)); ?>
		</div>
	</div>
</div>




